<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup</title>
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
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .result {
            margin-top: 20px;
        }
        .submit_div{
            display: flex;
            flex-direction: row;
            margin: 15px;
            justify-content: center;
        }
        .rem{
            padding: 10px;
            width: 20%;

            margin: 10px;
            background-color: skyblue;
            color: #fff;
            display: flex;
            justify-content: center;
            border: none;
            border-radius: 15px;
            cursor: pointer;

        }
        .success-gif {
            display: block;
            margin: 20px auto; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
    <h1>Data Added</h1>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connection = mysqli_connect("localhost", "root", "", "sample_login");

             if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['role'])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $age = $_POST["age"];
                $role = $_POST["role"];
                $query = "INSERT INTO `login2_data` (`name`, `email`, `age`, `role`, `password`) VALUES ('$username', '$email', '$age', '$role', '$password')";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    echo "<p class='success'>Data added successfully.</p>";
                } else {
                    echo "<p class='error'>Data not added.</p>";
                }
            }

            echo "<div class='result'>";
            echo "<p>Your account has been added to the portal successfully!</p>";
            echo "<p>These data were added to the database:</p>";
            echo "<p><strong>Username:</strong> " . $username . "</p>";
            echo "<p><strong>Email:</strong> " . $email . "</p>";
            echo "<p><strong>Age:</strong> " . $age . "</p>";
            echo "<p><strong>Job role:</strong> " . $role . "</p>";
            echo "</div>";

        }
        ?>

       
    </div>
    <div class="submit_div">
        <a class="rem" href="/test3/login.php">DOME</a>
    </div>
</body>
</html>
