<?php

session_start();

$conn = new mysqli("localhost", "root", "", "registration_db");

$message = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin
            WHERE username='$username'
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $_SESSION['admin'] = $username;

        header("Location: index.php");
    }
    else
    {
        $message = "Invalid Username or Password";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

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
    margin-top:100px;
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
}

.message{
    color:red;
    text-align:center;
    margin-top:10px;
}

</style>

</head>

<body>

<div class="container">

<h2>Admin Login</h2>

<form method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

<div class="message">
<?php echo $message; ?>
</div>

</div>

</body>
</html>