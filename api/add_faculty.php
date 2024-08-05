<?php
include '../config/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$bio = $_POST['bio'];
$date_of_joining = $_POST['date_of_joining'];

$cv_file = '';
$profile_pic = '';

if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] === UPLOAD_ERR_OK) {
    $cv_file = '../uploads/' . basename($_FILES['cv_file']['name']);
    move_uploaded_file($_FILES['cv_file']['tmp_name'], $cv_file);
}

if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
    $profile_pic = '../uploads/' . basename($_FILES['profile_pic']['name']);
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic);
}

$sql = "INSERT INTO faculty (name, email, phone, department, designation, bio, date_of_joining, cv_file, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssssss', $name, $email, $phone, $department, $designation, $bio, $date_of_joining, $cv_file, $profile_pic);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Faculty added successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add faculty']);
}

$stmt->close();
$conn->close();
?>
