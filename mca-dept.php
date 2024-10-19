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
         $name = $_POST["name"];
         $student-id = $_POST["student-id"];
         $email = $_POST["email"];
         $phone = $_POST["phone"];
         $gender = $_POST["gender"];
         $sujects = $_POST["subjects"];
         $lab-subjects = $_POST["lab-subjects"];

         // Insert data into the database
         $sql = "INSERT INTO mca-dept ( name, student-id, email, phone, gender, subjects, lab-subjects) VALUES ('$name', '$student-id', '$email', '$phone', '$gender', '$subjects', '$lab-subjects')";
          if ($conn->query($sql) === TRUE) {

            header("Location: services.html");

        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    else{
        echo "Error: Form subbmission method not allowed";
    }
    $conn->close();
    ?>



