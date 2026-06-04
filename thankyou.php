<?php
session_start();

if (!isset($_SESSION['form_submitted'])) {
    header("Location: index.php");
    exit();
}

unset($_SESSION['form_submitted']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Success</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ffffff;
}

.success-box{
    text-align:center;
    animation:fadeIn 0.5s ease;
}

.tick-circle{
    width:90px;
    height:90px;
    border:3px solid #22c55e;
    border-radius:50%;
    margin:0 auto 25px;
    position:relative;
    animation:pulse 1.5s infinite;
}

.tick{
    color:#22c55e;
    font-size:52px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-55%);
}

h2{
    color:#22c55e;
    font-size:34px;
    font-weight:500;
    margin-bottom:15px;
}

p{
    color:#888;
    font-size:18px;
    line-height:1.6;
}

.back-link{
    display:inline-block;
    margin-top:30px;
    color:#6b8cff;
    text-decoration:none;
    font-size:16px;
}

.back-link:hover{
    text-decoration:underline;
}

@keyframes pulse{
    0%{transform:scale(1);}
    50%{transform:scale(1.08);}
    100%{transform:scale(1);}
}

@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}
</style>
</head>

<body>

<div class="success-box">

    <div class="tick-circle">
        <div class="tick">✓</div>
    </div>

    <h2>submitted successfully!</h2>

    <p>
        Thank you! Your message has been submitted successfully.<br>
        KRITIKA JAIN
    </p>

    <a href="index.php" class="back-link">Go Back</a>

</div>

</body>
</html>
```
