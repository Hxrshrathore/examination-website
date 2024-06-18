<?php
include 'config.php';

if (!isset($_SESSION['form_id'])) {
    die("Invalid session data.");
}

$form_id = $_SESSION['form_id'];
$name = $_SESSION['name'];
$mobile_no = $_SESSION['mobile_no'];
$address = $_SESSION['address'];
$school_name = $_SESSION['school_name'];

// Calculate score
$score = 0;
foreach ($_POST as $key => $value) {
    if (strpos($key, 'q') === 0) {
        if ($value === 'correct') {
            $score += 1;
        }
    }
}

// Insert user data and score into the database
$stmt = $conn->prepare("INSERT INTO $form_id (name, mobile_no, address, school_name, score) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $name, $mobile_no, $address, $school_name, $score);

// Execute the query and handle the result
try {
    if ($stmt->execute()) {
        // Clear session data
        session_unset();
        session_destroy();
        
        // Redirect to result page with score
        header("Location: result.php?score=$score");
        exit();
    } else {
        throw new Exception("Error: " . $stmt->error);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
