<?php
require('fpdf/fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'User Details');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'ID: ' . $row['id']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Username: ' . $row['username']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Email: ' . $row['email']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'First Name: ' . $row['firstname']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Last Name: ' . $row['lastname']);
    $pdf->Output('D', 'user_details.pdf');
}

$conn->close();
?>
