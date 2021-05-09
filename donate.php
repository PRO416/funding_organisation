<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donate Funds</title>
</head>
<body>
  <h1><a href="index.php">home</a></h1>
  <form action="processDonation.php" method="post">
    <label for="name">
      name:
      <input type="text" name="name" id="name">
    </label>
    <label for="amount">
      amount:
      <input type="text" name="amount" id="amount">
    </label>
    <label for="extra">
      extra donations:
      <textarea name="extra_donation" id="extra" cols="30" rows="10"></textarea>
    </label>
    <button type="submit">donate</button>
  </form>
</body>
</html>