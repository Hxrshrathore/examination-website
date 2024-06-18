<?php
include 'config.php';

// Retrieve and sanitize form data
$form_id = $_POST['form_id'] ?? '';
$name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
$mobile_no = htmlspecialchars($_POST['mobile_no'] ?? '', ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_POST['address'] ?? '', ENT_QUOTES, 'UTF-8');
$school_name = htmlspecialchars($_POST['school_name'] ?? '', ENT_QUOTES, 'UTF-8');

// Validate form ID
$valid_forms = ['class7', 'class8', 'class9', 'class10', 'neet', 'jee'];
if (!in_array($form_id, $valid_forms)) {
    die("Invalid form ID.");
}

// Validate mobile number
if (!preg_match('/^[6-9][0-9]{9}$/', $mobile_no)) {
    die("Invalid mobile number.");
}

// Check if mobile number already exists
$stmt = $conn->prepare("SELECT COUNT(*) FROM $form_id WHERE mobile_no = ?");
$stmt->bind_param("s", $mobile_no);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "<script>alert('Mobile number already registered. Please use a different number.'); window.history.back();</script>";
    exit();
}

// Store data in session
$_SESSION['form_id'] = $form_id;
$_SESSION['name'] = $name;
$_SESSION['mobile_no'] = $mobile_no;
$_SESSION['address'] = $address;
$_SESSION['school_name'] = $school_name;

// Redirect to the quiz page
header("Location: quiz_template.php");
exit();
?>
