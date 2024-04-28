<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>This is Login Page</h1>
    <form action="login.php" method="post">
        UserName: <br>
        <input type="text" name="username"> <br>
        Password:<br>
        <input type="password" name="password"> <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>
<?php
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        echo "Enter valid User-Name <br>";
    } elseif (empty($password)) {
        echo "Enter valid Password <br>";
    } else {
        $sql = "SELECT `user`, `password` FROM `users` WHERE `user` = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $db_username = $row["user"];
            $HasedPassword = $row["password"];

            if (!password_verify($password, $HasedPassword)) {
                echo "Wrong Password";
            } else {
                $_SESSION["username"] = $username;
                header("location: home.php");
                exit;
            }
        } else {
            echo "User Invalid";
        }
    }
}
?>