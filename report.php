<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$conn = new mysqli(
    "sql104.infinityfree.com",
    "if0_41987640",
    "Timeshift60",
    "if0_41987640_registration_db"
);



// FILTERED REPORT

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $searchTerm = "%".$search."%";

    $stmt = $conn->prepare("
    SELECT * FROM users
    WHERE name LIKE ?
    OR mobile LIKE ?
    ORDER BY id DESC
    ");

    $stmt->bind_param(
        "ss",
        $searchTerm,
        $searchTerm
    );

    $stmt->execute();

    $result = $stmt->get_result();


    // COUNT FILTERED RECORDS

    $countStmt = $conn->prepare("
    SELECT COUNT(*) AS total
    FROM users
    WHERE name LIKE ?
    OR mobile LIKE ?
    ");

    $countStmt->bind_param(
        "ss",
        $searchTerm,
        $searchTerm
    );

    $countStmt->execute();

    $countResult = $countStmt->get_result();

    $rowCount = $countResult->fetch_assoc();

    $reportTitle = "Showing Filtered Report For: "
    . strtoupper($search);
}
else
{
    // FULL REPORT

    $result = $conn->query("
    SELECT * FROM users
    ORDER BY id DESC
    ");

    $count = $conn->query("
    SELECT COUNT(*) AS total
    FROM users
    ");

    $rowCount = $count->fetch_assoc();

    $reportTitle = "Showing Full Report";
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Customer Report</title>

<style>

body{
    font-family:Arial;
    background:#f2f2f2;
    padding:20px;
}

.container{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table, th, td{
    border:1px solid #ccc;
}

th{
    background:#eee;
}

th, td{
    padding:10px;
    text-align:center;
}

.print-btn{
    background:green;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:5px;
    cursor:pointer;
    margin-bottom:20px;
}

.print-btn:hover{
    background:darkgreen;
}

@media print{

    .print-btn{
        display:none;
    }

    body{
        background:white;
    }

}

</style>

</head>

<body>

<div class="container">

<button class="print-btn"
onclick="window.print()">

🖨 Print Report

</button>

<h2>Customer Report</h2>

<h3>
<?php echo $reportTitle; ?>
</h3>

<h4>
Generated On:
<?php echo date("d-m-Y h:i:s A"); ?>
</h4>

<h4>
Total Records:
<?php echo $rowCount['total']; ?>
</h4>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>

</tr>

<?php

while($row = $result->fetch_assoc())
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['mobile']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>