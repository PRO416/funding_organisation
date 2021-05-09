<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>clear debt</title>
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

    $student_debt = "SELECT debt FROM students WHERE name = \"{$student_name}\" AND surname = \"{$student_surname}\"";
    $sql_donation = "SELECT amount FROM donations";

    $debt_result = $mysqli -> query($student_debt);
    $balance = $mysqli -> query($sql_donation);

    $debt_result -> fetch_all(MYSQLI_ASSOC);
    $balance -> fetch_all(MYSQLI_ASSOC);

    $debt_amount = 0;
    $new_bal = 0;

    foreach($debt_result as $debt) $debt_amount += $debt['debt'];

    foreach($balance as $bal) {
      $new_bal += $bal['amount'];
      $new_bal -= $debt_amount;
    }

    echo "new balance: {$new_bal}";
    echo "student debt: {$debt_amount}";

    
    $update_balance = "UPDATE donations SET amount = $new_bal";

    if ($mysqli->query($update_balance) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $update_student_status = "UPDATE students SET funded = 1 WHERE name = \"{$student_name}\" AND surname = \"{$student_surname}\"";
    $update_student_balance = "UPDATE students SET debt = 0 WHERE name = \"{$student_name}\" AND surname = \"{$student_surname}\"";

    if ($mysqli -> query($update_student_status) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    if ($mysqli -> query($update_student_balance) === TRUE) {
      echo "Record updated successfully";

      //redirect to students list
      //echo "<script>location.href = \"allStudents.php\"</script>";
      echo "<script>location.href = \"letterFromStudent.php\"</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $debt_result -> free_result();
    $balance -> free_result();
    
    $mysqli->close();
  ?>
</body>
</html>