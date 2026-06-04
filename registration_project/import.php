<?php

$conn = new mysqli("localhost", "root", "", "registration_db");

$message = "";

if(isset($_POST['import']))
{
    $filename = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");

        fgetcsv($file);

        while(($data = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $id       = $data[0];

$name     = strtoupper($data[1]);
$email    = $data[2];
$mobile   = $data[3];
$password = $data[4];

$stmt = $conn->prepare("
INSERT INTO users(name,email,mobile,password)
VALUES(?,?,?,?)
");

$stmt->bind_param(
    "ssss",
    $name,
    $email,
    $mobile,
    $password
);

$stmt->execute();        }

        fclose($file);

        header("Location: index.php?imported=1");
	exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Import CSV</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:400px;
    background:white;
    padding:20px;
    margin:auto;
    margin-top:50px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

input{
    margin-top:15px;
}

button{
    width:100%;
    padding:10px;
    margin-top:15px;
    background:blue;
    color:white;
    border:none;
    border-radius:5px;
}

.message{
    color:green;
    text-align:center;
    margin-top:15px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Import CSV File</h2>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="file" required>

<button type="submit" name="import">
Import CSV
</button>

</form>

<div class="message">
<?php echo $message; ?>
</div>

</div>

</body>
</html>