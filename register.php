<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>This Is Register Page</h1>
    <form action="register.php" method="post">
        UserName: <br>
        <input type="text" name="username"> <br>
        Password:<br>
        <input type="password" name="password"> <br>
        <input type="submit" name="Register" value="Register">
    </form>
</body>

</html>

<?php
if (isset($_POST["Register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        echo "Enter valid User-Name <br>";
    } elseif (empty($password)) {
        echo "Enter valid Password <br>";
    } else {
        $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user,password) VALUES ('$username','$hasedPassword')";
        mysqli_query($conn, $sql);
        header("location:login.php");
        exit;
    }
}
?>

<?php
mysqli_close($conn);
?>