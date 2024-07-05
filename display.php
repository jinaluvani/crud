<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email, firstname, lastname FROM user";
$res = mysqli_query($conn, $sql);

if ((mysqli_num_rows($res)) > 0) {
    echo "
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";
    while($row = mysqli_fetch_assoc($res)) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td>";
        echo "<td><a href='edit.php?id=".$row['id']."' class='btn btn-primary'>Edit</a> <a href='delete.php?id=".$row['id']."' class='btn btn-danger'>Delete</a> <a href='download.php?id=".$row['id']."' class='btn btn-success'>Download</a></td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
?>
