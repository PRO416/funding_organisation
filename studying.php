<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSIT</title>
</head>
<body>
  <?php
    //this is chapter 2
    echo "chapter 2 work";

    $names = array("Thapelo", "James", "David", "Jose", "Owen");

    function createEchos($sentence) {
      echo "<h3>my name is $sentence</h3>";
    }

    foreach($names as $name) {
      createEchos($name);
    }

    $stringOfNames = "Thapelo, James, David, Jose, Owen";

    // 2
  ?>
</body>
</html>