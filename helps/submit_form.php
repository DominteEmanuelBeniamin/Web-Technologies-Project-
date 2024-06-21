<?php
header('Content-Type: application/json');
require_once 'db_connection.php';

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'];
$formData = $input['form'];

if (!$username || !$formData) {
    echo json_encode(['status' => 'NO', 'message' => 'Invalid input']);
    exit();
}

$db = new Db();


$query = "SELECT id FROM accounts WHERE username = '" . mysqli_real_escape_string($db->db_handle, $username) . "'";
$result = $db->execute_query($query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo json_encode(['status' => 'NO', 'message' => 'User not found']);
    exit();
}

$id_user = $user['id'];
$form_name = $formData['name'];
$formDataJson = mysqli_real_escape_string($db->db_handle, json_encode($formData));

$query = "INSERT INTO forms (id_user, id_form, form_name, form) VALUES ('$id_user', NULL,'$form_name', '$formDataJson')";
$success = $db->execute_query($query);

if ($success) {
    echo json_encode(['status' => 'YES']);
} else {
    echo json_encode(['status' => 'NO', 'message' => 'Database error']);
}
?>

