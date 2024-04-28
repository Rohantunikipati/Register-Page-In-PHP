<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: register.php"); 
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Welcome, <?php echo $username; ?></h1>
    <p>This is the home page. Only logged-in users can see this content.</p>
    <form action="home.php" method="post"> 
        <input type="submit" value="Logout" name="logout">
    </form>
</body>

</html>

<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.php"); 
    exit;
}
?>
