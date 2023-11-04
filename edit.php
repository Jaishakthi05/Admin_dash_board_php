<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
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
        form {
            width: 70%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        label {
            display: block;
            margin: 5px 0px;
            margin-top: 10px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            width: 50%;
            color: #fff;
            border: none;
            padding: 10px;
            justify-self: center;
            margin: 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .submit_div {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        .rem {
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
        .rem:hover {
            background-color: darkred;
        }
        .msg{
            color: green;
            display: flex;
            justify-content: center;
            border: 2px solid green;
            border-radius: 15px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Edit Record</h1>
    
    <?php
    if (isset($_GET['id'])) {
        $connection = mysqli_connect("localhost", "root", "", "sample_login");
        
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $role = $_POST['role'];
            $password = $_POST['password'];
            
            $sql = "UPDATE login2_data SET name='$name', email='$email', age='$age', role='$role', password='$password' WHERE id='$id'";
            if (mysqli_query($connection, $sql)) {
                echo "<div class='msg'>
                <h2>Record updated successfully.</h2>
                 </div>
                
                ";
            } else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM login2_data WHERE id = $id";
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            echo "<form method='post' action='edit.php?id=$id'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<label for='name'>Name:</label>";
            echo "<input type='text' name='name' value='" . $row['name'] . "'>";
            echo "<label for='email'>Email:</label>";
            echo "<input type='text' name='email' value='" . $row['email'] . "'>";
            echo "<label for='age'>Age:</label>";
            echo "<input type='text' name='age' value='" . $row['age'] . "'>";
            echo "<label for='role'>Job Role:</label>";
            echo "<input type='text' name='role' value='" . $row['role'] . "'>";
            echo "<label for='password'>Password:</label>";
            echo "<input type='text' name='password' value='" . $row['password'] . "'>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
        } else {
            echo "Record not found.";
        }


        mysqli_close($connection);
    } 
    else
    {
        echo "ID parameter not set in the URL.";
    }

    ?>

    <div class="submit_div">
        <a class="rem" href="/test3/remove_user.php">BACK</a>
    </div>
</body>
</html>
