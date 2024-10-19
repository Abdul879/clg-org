<?php
    // Database connection
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "clg-org"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Retrieve form data using POST method 
       $student_name = $_POST["student_name"];
       $student_id = $_POST["student_id"];
       $department = $_POST["department"];
       $teacher = $_POST["teacher"];
       $rating = $_POST["rating"];
       $feedback = $_POST["feedback"];

       // Insert data into the database
       $sql = "INSERT INTO feedback (student_name, student_id, department, teacher, rating, feedback) 
               VALUES ('$student_name', '$student_id', '$department', '$teacher', '$rating', '$feedback')";
       
       if ($conn->query($sql) === TRUE) {
            header("Location: Contact.html");
       } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
       }
    } else {
        echo "Error: Form submission method not allowed";
    }
    
    $conn->close();
?>
