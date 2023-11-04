<?php
    
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "$id";
} else {
    echo "No ID specified.";
}


$connection = mysqli_connect("localhost", "root", "", "sample_login");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM login2_data WHERE id = $id";
    if (mysqli_query($connection, $sql)) {
        echo "Record with ID $id has been deleted.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);

    header("Location: remove_user.php"); 
    exit();
} else {
    echo "No ID specified.";
}



?>
