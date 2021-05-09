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

    $sql = "SELECT * FROM funders ORDER BY donation_date";

    $result = $mysqli -> query($sql);

    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);

    echo "<table class=\"table\">";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Funder</td>";
    echo "<td>Amount</td>";
    echo "<td>Date</td>";
    echo "<td>Remove entry</td></tr></thead><tbody>";
    foreach($result as $row) {
      echo "<tr>";
      echo "<td>{$row["name"]}</td>";
      echo "<td>R{$row["amount"]}</td>";
      echo "<td>{$row["donation_date"]}</td>";
      echo "<td>
        <form action=\"processFunderRemoval.php\" method=\"get\">
          <input type=\"text\" name=\"name\" value=\"{$row["name"]}\" style=\"display: none\">
          <button type=\"submit\">Remove</button>
        </form>
      </td>";
      echo "</tr>";
    }
    echo "</tbody></table>";

    echo "<button><a href=\"donate.php\">Become a funder</a></button>";

    //Frees memory from results
    $result -> free_result();

    $mysqli -> close();
  ?>
</body>
</html>