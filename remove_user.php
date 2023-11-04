<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            height: 100%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
      
        tr:hover{
            background-color: darkgrey;
        }
        .del {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .del:hover{
            background-color: red;
            color: #fff;
            border: none;
            padding: 8px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit {
            background-color: darkgreen;
            color: #fff;
            border: none;
            padding: 8px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .rem{
            padding: 10px;
            width: 10%;
            margin: 10px;
            background-color: red;
            color: #fff;
            display: flex;
            justify-content: center;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
        .rem:hover{
            background-color: darkred;
        }
        .submit_div{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h1>PORTAL</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AGE</th>
            <th>JOB ROLE</th>
            <th>password</th>
            <th>Action</th>
        </tr>
        <?php
        $msg="";

        $connection = mysqli_connect("localhost", "root", "", "sample_login");
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT id,name, email, age, role,password FROM login2_data";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td><a class='del' data-id='" . $row["id"] . "'>Delete</a>
                        <a class='edit' href='edit.php?id=".$row["id"] . "&name=" . $row["name"] . "&email=" . $row["email"] . "&age=" . $row["age"] . "&role=" . $row["role"] . "&password=" . $row["password"] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found.</td></tr>";
        }

        mysqli_close($connection);
        ?>
    </table>

    <div class="submit_div">
        <a class="rem" href="/test3/login.php">BACK</a>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }

        const deleteButtons = document.querySelectorAll('.del');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const id = this.getAttribute('data-id');
                confirmDelete(id);
            });
        });
    </script>
</body>
</html>
