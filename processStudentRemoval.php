<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remove student</title>
</head>
<body>
  <?php
    $mysqli = new mysqli("localhost", "root", "thapelomataboge18", "donation_organisation");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $student_name = $_GET['name'];
    $student_surname = $_GET['surname'];

    $sql = "DELETE FROM students WHERE name = \"{$student_name}\" AND surname = \"{$student_surname}\"";

    if ($mysqli->query($sql) === TRUE) {
      echo "Student record deleted successfully";

      echo "<script>location.href = \"allStudents.php\"</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  ?>
</body>
</html>