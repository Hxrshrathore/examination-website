<?php
session_start();

if (!isset($_SESSION['auth'])) {
    if ($_POST['password'] === 'yourpassword') {
        $_SESSION['auth'] = true;
    } else {
        die("Unauthorized access");
    }
}

include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=exam_data.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "Form\tName\tMobile No.\tAddress\tSchool Name\tScore\tExam Time\n";

$tables = ['class7', 'class8', 'class9', 'class10', 'neet', 'jee'];

foreach ($tables as $table) {
    $stmt = $conn->prepare("SELECT name, mobile_no, address, school_name, score, exam_time FROM $table");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "$table\t" . htmlspecialchars(implode("\t", $row)) . "\n";
    }
}

$conn->close();
?>
