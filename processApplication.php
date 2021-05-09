<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate</title>
</head>
<body>
  <?php
    $mysqli = new mysqli("localhost", "root", "thapelomataboge18", "donation_organisation");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $student_name = $_POST['name'];
    $student_amount = $_POST['surname'];
    $institution = $_POST['institution'];
    $course = $_POST['course'];
    $debt = $_POST['debt'];

    $sql = "INSERT INTO students (name, surname, institution, course, debt) VALUES ('{$student_name}', '{$student_amount}', '{$institution}', '{$course}', {$debt})";

    if ($mysqli->query($sql) === TRUE) {
      echo "New record created successfully";

      //redirect to students list
      echo "<script>location.href = \"allStudents.php\"</script>";

    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    
    $mysqli->close();
  ?>
</body>
</html>