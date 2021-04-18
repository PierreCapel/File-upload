<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<h3> First Name :<?php echo $_POST["firstname"] ?> </h3>
<h3> Last Name :<?php echo $_POST["lastname"] ?> </h3>
<h3> Age :<?php echo $_POST["age"] ?> </h3>
<img src="<?php echo $_POST['img-path'] ?>">

</body>
</html>