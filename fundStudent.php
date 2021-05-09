<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fund Student</title>
</head>
<body>
  <a href="./allStudents.php">back to students list</a><br>
  <?php
    $mysqli = new mysqli("localhost", "root", "thapelomataboge18", "donation_organisation");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $student_name = $_GET['name'];
    $student_surname = $_GET['surname'];

    $sql_student = "SELECT * FROM students WHERE name = \"{$student_name}\" AND surname = \"{$student_surname}\"";

    $sql_donation = "SELECT amount FROM donations";

    $result = $mysqli -> query($sql_student);

    $balance = $mysqli -> query($sql_donation);

    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);

    $balance -> fetch_all(MYSQLI_ASSOC);

    $bala = 0;

    foreach($balance as $bal) {
      echo "DONATION BALANCE REMAINING: R{$bal['amount']}";
      $bala += $bal['amount'];
    }

    echo "<table class=\"table\">";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Student</td>";
    echo "<td>Institution</td>";
    echo "<td>Course</td>";
    echo "<td>Debt</td>";
    echo "<td>Action</td>";
    echo "</tr></thead><tbody>";
    foreach($result as $row) {
      echo "<tr>";
      echo "<td>{$row["name"]} {$row["surname"]}</td>";
      echo "<td>{$row["institution"]}</td>";
      echo "<td>{$row["course"]}</td>";
      echo "<td>{$row["debt"]}</td>";
      if($bala >= $row["debt"]) {
        echo
          "<td>
            <form action=\"clearDebt.php\" method=\"get\">
              <input type=\"text\" name=\"name\" value=\"{$row["name"]}\" style=\"display: none\">
              <input type=\"text\" name=\"surname\" value=\"{$row["surname"]}\" style=\"display: none\">
              <button type=\"submit\">Clear debt</button>
            </form>
          </td>";

      } else {
        echo "<td>insufficient funds to clear student debt</td>";
      }
      echo "</tr>";
    }
    echo "</tbody></table>";

    $result -> free_result();
    
    $mysqli->close();
  ?>
</body>
</html>