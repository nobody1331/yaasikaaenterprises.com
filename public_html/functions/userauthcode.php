<?php

session_start();
include('../config/dbconfig.php');
include('myfunction.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);

    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email already registered";
        header('location: ../admin/add-staff.php');
    } else {
        if ($password == $cpassword) {
            // Set role_as to 1 for admin users
            $role_as_value = $role_as == 'admin' ? 1 : 0;

            // Insert user data
            $insert_query = "INSERT INTO users (name,email,phone,password,role_as) VALUES ('$name','$email','$phone','$password','$role_as_value')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Registration Successful";
                header('location: ../admin/staff.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('location: ../admin/add-staff.php');
            }
        } else {
            $_SESSION['message'] = "Passwords do not match";
            header('location: ../admin/add-staff.php');
        }
    }
}



?>
