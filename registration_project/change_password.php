<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "registration_db"
);

$message = "";

if(isset($_POST['change']))
{
    $old_username = $_POST['old_username'];
    $old_password = $_POST['old_password'];

    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    $check = $conn->query("
    SELECT * FROM admin
    WHERE username='$old_username'
    AND password='$old_password'
    ");

    if($check->num_rows > 0)
    {
        $conn->query("
        UPDATE admin
        SET
        username='$new_username',
        password='$new_password'
        WHERE username='$old_username'
        ");

        $message = "Username & Password Updated Successfully";
    }
    else
    {
        $message = "Old Username or Password Incorrect";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Change Password</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:350px;
    background:white;
    padding:20px;
    margin:auto;
    margin-top:80px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

input{
    width:100%;
    padding:10px;
    margin-top:10px;
}

button{
    width:100%;
    padding:10px;
    margin-top:15px;
    background:green;
    color:white;
    border:none;
    cursor:pointer;
}

.message{
    text-align:center;
    margin-top:10px;
    color:blue;
}

.back-btn{
    background:#555;
}

</style>

</head>

<body>

<div class="container">

<h2>Change Username / Password</h2>

<form method="POST">

<input type="text"
name="old_username"
placeholder="Old Username"
required>

<input type="password"
name="old_password"
placeholder="Old Password"
required>

<input type="text"
name="new_username"
placeholder="New Username"
required>

<input type="password"
name="new_password"
placeholder="New Password"
required>

<button type="submit" name="change">
Update Details
</button>

</form>

<div class="message">
<?php echo $message; ?>
</div>

<br>

<a href="index.php">
<button class="back-btn">
Back
</button>
</a>

</div>

</body>
</html>