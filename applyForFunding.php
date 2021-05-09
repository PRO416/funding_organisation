<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1><a href="index.php">home</a></h1>

  <form action="processApplication.php" method="post">
    <label for="name">
      name:
      <input type="text" name="name" id="name">
    </label>
    <label for="surname">
      surname:
      <input type="text" name="surname" id="surname">
    </label>
    <label for="institution">
      institution:
      <input type="text" name="institution" id="institution">
    </label>
    <label for="course">
      course:
      <input type="text" name="course" id="course">
    </label>
    <label for="debt">
      debt:
      <input type="text" name="debt" id="debt">
    </label>
    <button type="submit">apply</button>
  </form>
</body>
</html>