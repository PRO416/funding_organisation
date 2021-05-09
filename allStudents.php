<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>All Funders</title>
</head>
<body>
  <h1><a href="index.php">home</a></h1>
  <?php
    include 'menu.inc';

    $mysqli = new mysqli("localhost", "root", "thapelomataboge18", "donation_organisation");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $sql = "SELECT * FROM students";

    $result = $mysqli -> query($sql);

    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);

    echo "<table class=\"table\">";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Student</td>";
    echo "<td>Institution</td>";
    echo "<td>Course</td>";
    echo "<td>Debt</td>";
    echo "<td>Status</td><td>Action</td>";
    echo "<td>remove entry</td></tr></thead><tbody>";
    foreach($result as $row) {
      echo "<tr>";
      echo "<td>{$row["name"]} {$row["surname"]}</td>";
      echo "<td>{$row["institution"]}</td>";
      echo "<td>{$row["course"]}</td>";
      echo "<td>R{$row["debt"]}</td>";

      if($row["funded"]) echo "<td>YES</td>";
      else echo "<td>NO</td>";

      if($row["funded"]) {
        echo "<td><p>funded</p></td>";
      } else
      echo
        "<td style=\"width: 20px\">
          <form action=\"fundStudent.php\" method=\"get\">
            <input type=\"text\" name=\"name\" value=\"{$row["name"]}\" style=\"display: none\">
            <input type=\"text\" name=\"surname\" value=\"{$row["surname"]}\" style=\"display: none\">
            <button type=\"submit\">Fund</button>
          </form>
        </td>";

      if($row["funded"]) {
        echo "<td>
          <form action=\"processStudentRemoval.php\" method=\"get\">
            <input type=\"text\" name=\"name\" value=\"{$row["name"]}\" style=\"display: none\">
            <input type=\"text\" name=\"surname\" value=\"{$row["surname"]}\" style=\"display: none\">
            <button type=\"submit\">Remove</button>
          </form>
        </td>";
      } else {
        echo "<td>Student not yet funded</td>";
      }

      echo "</tr>";
    }
    echo "</tbody></table>";

    //Frees memory from results
    $result -> free_result();

    $mysqli -> close();
  ?>
</body>
</html>