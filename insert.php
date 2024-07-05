<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO user (username, email, password, firstname, lastname) VALUES ('$username', '$email', '$password', '$firstname', '$lastname')";
    $res = mysqli_query($conn, $sql);
    if($res){
        header('location:index.php');
    }else{
        echo mysqli_error($conn);
    }

    $conn->close();
}
?>
