<!DOCTYPE html>
<html>
<head>
    <title>CREATE USER</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        h2 {
            color: #333;
            text-align: center;
        }
        
        form {
            max-width: 50%;
            margin: 0 auto;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
       
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            justify-self: center;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .rem{
            padding: 10px;
            width: 20%;

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
        input[type="submit"] {
            padding: 10px;
            width: 20%;
            margin: 10px;
            background-color: #007bff;
            color: #fff;
            display: flex;
            justify-content: center;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
        .submit_div{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>ADD EMPLOYEE ROLE AND DATA</h2>
    <form action="setup.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age">
        
        <label for="role">Job role:</label>
        <input type="text" id="role" name="role" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="submit_div">
                <input type="submit" value="Add">
                <a class="rem" href="/test3/remove_user.php">View Portal</a>

        </div>
        
        

       
    
    </form>

   


   


</body>
</html>
