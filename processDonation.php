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

    $funder_name = $_POST['name'];
    $funder_amount = $_POST['amount'];

    $funders_sql = "INSERT INTO funders (name, amount) VALUES ('{$funder_name}', {$funder_amount})";
    $donations_sql = "SELECT amount FROM donations";

    $donation_amount = $mysqli -> query($donations_sql);

    $donation_amount -> fetch_all(MYSQLI_ASSOC);

    $new_bal = 0;

    foreach($donation_amount as $amt) {
      $new_bal += $amt['amount'];
      $new_bal += $funder_amount;
    }

    if ($mysqli->query($funders_sql) === TRUE) {
      echo "New record created successfully";

      $update_balance = "UPDATE donations SET amount = $new_bal";

      if ($mysqli->query($update_balance) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
      
      //redirect to funders list
      echo "<script>location.href = \"letterFromOffice.php\"</script>";

    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    
    $mysqli->close();
  ?>
</body>
</html>