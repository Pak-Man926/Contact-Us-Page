<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $comments = trim($_POST['comments']);

    $errors = [];

    // Validate first name
    if (empty($fname)) {
        $errors[] = "First Name is required";
    }

    // Validate last name
    if (empty($lname)) {
        $errors[] = "Last Name is required";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate contact
    if (empty($contact)) {
        $errors[] = "Contact is required";
    } elseif (!preg_match("/^[0-9+]*$/", $contact)) {
        $errors[] = "Contact must contain only numbers and '+'";
    }

    // Validate comments
    if (empty($comments)) {
        $errors[] = "Comments are required";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        
        echo "<p style='color:green;'>Form submitted successfully!</p>";
    }
}
?>
