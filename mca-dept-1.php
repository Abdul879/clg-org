<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CSE-DEPT</title>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap");
    body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 17%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  border-right: 4px solid black;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* return button */
.btn {
    background: #2676c2;
    width: 100px;

  }

  .btn a {
    text-decoration: none;
    color: #000;
  }

  /* dropdown */
  .dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
    z-index: 1;
}

.dropdown-content a {
    color: #fff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<body>
  
<ul>
        <div>
        <center>
                <img src="images/admin.png" width="150px" height="150px">
            </center>
        </div>
        <li><a href="Admin.html">Home</a></li>
        <li><a href="cse-dept-1.php">cse-dept</a></li>
        <li><a href="ece-dept-1.php">ece-dept</a></li>
        <li><a href="mca-dept-1.php">mca-dept</a></li>
        <li><a href="mba-dept-1.php">mba-dept</a></li>
        <li><a href="feedback-1.php">Feedback</a></li>
        <br><br><br><br><br><br><br><br><br><br>
        <center>
            <button class="btn"> <a href="index.html">Log out</a> </button>
        </center>
    </ul>
  
  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <div class="container my-5">
      <h2 class="text-center">MCA-DEPT</h2> <br><br>
      <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Sno</th>
                <th>Name of Student</th>
                <th>Student ID</th>
                <th>Email</th>
                <th>phone </th>
                <th>Gender</th>
                <th>Subject </th>
                <th>Lab-Subject </th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = mysqli_connect("localhost", "root", "", "clg-org");
            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['delete'])) {
                    // Delete record
                    $name = $_POST['name'];
                    $qry = "DELETE FROM mca_dept WHERE name='$name'";
                    if (mysqli_query($conn, $qry)) {
                        echo "<div class='alert alert-success' role='alert'>Record deleted successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . mysqli_error($conn) . "</div>";
                    }
                }
            }

            $qry = "SELECT * FROM mca_dept";
            $result = mysqli_query($conn, $qry);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["subjects"] . "</td>";
                    echo "<td>" . $row["lab_subjects"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='name' value='" . $row["name"] . "'>";
                    echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";

                    // Modal content...
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
      </table>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>