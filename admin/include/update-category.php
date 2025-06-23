<?php
session_start();
if (!isset($_SESSION['ADMIN_ID']) || empty($_SESSION['ADMIN_ID'])) {
    header('Location: login.php');
    exit;
}

require '../../dbcon.php';

// Check if required fields are set
if (empty($_POST['cid']) || empty($_POST['name'])) {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info!';
    header('location: ../category-edit.php');
    exit;
}

// Sanitize inputs
$cid = intval($_POST['cid']);
$name = trim($_POST['name']);
$parent_id = isset($_POST['parent_id']) && $_POST['parent_id'] !== "" ? intval($_POST['parent_id']) : NULL;

// Use prepared statement to prevent SQL injection
$query = "UPDATE `category` SET `name` = ?, `parent_id` = ? WHERE `cid` = ?";
$stmt = $conn->prepare($query);

// Bind parameters
$stmt->bind_param("sii", $name, $parent_id, $cid);

// Execute and check for success
if ($stmt->execute()) {
    $_SESSION['msg']['type'] = 'success';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Category updated successfully!';
    header('location: ../category.php');
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-info-circle"></i> Error: '.$stmt->error;
    header('location: ../category-edit.php');
}

// Close statement and connection
$stmt->close();
$conn->close();
exit;
?>
