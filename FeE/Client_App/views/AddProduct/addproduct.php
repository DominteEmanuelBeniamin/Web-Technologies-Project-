<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productImage = $_FILES['productImage'];
    $questions = $_POST['questions'];
    $options = $_POST['options'];

    // Handle the image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($productImage['name']);
    if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($productImage['name'])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }

    // Handle the questions and options
    foreach ($questions as $index => $question) {
        echo "Question: " . htmlspecialchars($question) . "<br>";
        if (!empty($options[$index])) {
            echo "Options: " . htmlspecialchars($options[$index]) . "<br>";
        }
    }
}

