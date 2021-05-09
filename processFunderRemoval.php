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

    $sql = "DELETE FROM funders WHERE name = \"{$student_name}\"";

    if ($mysqli->query($sql) === TRUE) {
      echo "Funder record deleted successfully";

      echo "<script>location.href = \"allFunders.php\"</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  ?>
</body>
</html>