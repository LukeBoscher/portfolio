<?php
$servername = "mysql";
$username = "root";
$password = "qwerty";
$dbname = "testphp";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $action = $_POST['action'];

    if ($action == "Insert") {
        $sql = "INSERT INTO account (name, email) VALUES ('$name', '$email')";
    } elseif ($action == "Update") {
        $sql = "UPDATE account SET name='$name', email='$email' WHERE id=$id";
    } elseif ($action == "Delete") {
        $sql = "DELETE FROM account WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record $action successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Manipulation Form</h1>
    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id"><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>
        <input type="submit" name="action" value="Insert">
        <input type="submit" name="action" value="Update">
        <input type="submit" name="action" value="Delete">
    </form>
</body>
</html>