<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

?>

<?php

$conn = new mysqli("localhost", "root", "", "registration_db");

$message = "";

if(isset($_GET['updated']))
{
    $message = "Data Updated Successfully";
}

$edit_id = "";
$edit_name = "";
$edit_email = "";
$edit_mobile = "";
$edit_password = "";


// SAVE DATA

if(isset($_POST['save']))
{
    $name = strtoupper($_POST['name']);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $check = $conn->query("
    SELECT * FROM users
    WHERE TRIM(UPPER(name)) = TRIM(UPPER('$name'))
    ");

    if($check->num_rows > 0)
    {
        $message = "Name Already Exists";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,mobile,password)
                VALUES('$name','$email','$mobile','$password')";

        if($conn->query($sql) === TRUE)
        {
            header("Location: index.php?updated=1");
            exit();
        }
    }
}

// DELETE DATA

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $conn->query("DELETE FROM users WHERE id=$id");

    header("Location: index.php");
}


// EDIT DATA FETCH

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];

    $result = $conn->query("SELECT * FROM users WHERE id=$id");

    $row = $result->fetch_assoc();

    $edit_id = $row['id'];
    $edit_name = $row['name'];
    $edit_email = $row['email'];
    $edit_mobile = $row['mobile'];
    $edit_password = $row['password'];
}


// UPDATE DATA

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $name = strtoupper($_POST['name']);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

$check = $conn->query("
SELECT * FROM users
WHERE name='$name'
AND id!=$id
");

if($check->num_rows > 0)
{
    $message = "Name Already Exists";
}
else
{   
 $sql = "UPDATE users
            SET
            name='$name',
            email='$email',
            mobile='$mobile',
            password='$password'
            WHERE id=$id";

    if($conn->query($sql) === TRUE)
    {
        header("Location: index.php?updated=1");
        exit();
    }
}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Registration Form</title>

<style>

.footer{
    text-align:center;
    padding:15px;
    margin-top:30px;
    background:#e9e9e9;
    border-top:2px solid #ccc;
    font-family:Arial;
    font-weight:bold;
}


.delete-all-btn,
.show-all-btn{
    width:140px;
    height:42px;
    border:none;
    border-radius:5px;
    font-weight:bold;
    cursor:pointer;
    margin-top:15px;
}

.delete-all-btn{
    background:red;
    color:white;
}



body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:90%;
    max-width:1000px;
    margin:auto;
    background:white;
    padding:20px;
    margin-top:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

h2{
    text-align:center;
}

input{
    width:97%;
    padding:10px;
    margin-top:10px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:15px;
}

button{
    padding:10px 15px;
    margin-top:15px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:darkgreen;
}

.message{
    color:green;
    text-align:center;
    margin-top:10px;
    font-weight:bold;
}

table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}

.table-container{
    max-height:400px;
    overflow-y:auto;
    margin-top:20px;
}

table, th, td{
    border:1px solid #ccc;
}

th{
    background:#eee;
    position: sticky;
    top: 0;
    z-index: 1;
}

th, td{
    padding:10px;
    text-align:center;
}

.edit-btn{
    background:blue;
    color:white;
    padding:5px 10px;
    text-decoration:none;
    border-radius:5px;
}

.delete-btn{
    background:red;
    color:white;
    padding:5px 10px;
    text-decoration:none;
    border-radius:5px;
}

.button-row{
    display:flex;
    gap:10px;
    margin-top:20px;
    justify-content:center;
    flex-wrap:wrap;
}

.button-row button{
    padding:10px 20px;
    border:none;
    border-radius:5px;
    color:white;
    font-size:15px;
    cursor:pointer;
    background:green;
    min-width:150px;
}

.button-row button:hover{
    background:darkgreen;
}

.search-box{
    display:flex;
    align-items:center;
    gap:10px;
}

.search-form input{
    padding:10px;
    width:220px;
    border:1px solid #ccc;
    border-radius:5px;
}

.logout-btn{
    background:#555 !important;
}

.logout-btn:hover{
    background:#333 !important;
}
</style>

</head>

<body>


<h2>Registration Form CRUD</h2>


<form method="POST" id="mainForm">

<input type="hidden"
name="id"
value="<?php echo $edit_id; ?>">

<input type="text"
name="name"
placeholder="Enter Name"
required
value="<?php echo $edit_name; ?>">

<input type="email"
name="email"
placeholder="Enter Email"
required
value="<?php echo $edit_email; ?>">

<input type="text"
name="mobile"
placeholder="Enter Mobile"
required
value="<?php echo $edit_mobile; ?>">

<input type="password"
name="password"
placeholder="Enter Password"
required
value="<?php echo $edit_password; ?>">

</form>
<div class="message" id="msg">
<?php echo $message; ?>
</div>


<?php

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $searchTerm = "%".$search."%";

    // RECORD COUNT
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

    // RECORD FETCH
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
}
else
{
    // TOTAL RECORD COUNT
    $countResult = $conn->query("
    SELECT COUNT(*) AS total
    FROM users
    ");

    // FETCH ALL RECORDS
    $result = $conn->query("
    SELECT * FROM users
    ORDER BY id DESC
    ");
}

$countRow = $countResult->fetch_assoc();

?>

<h3>
Total Records:
<?php echo $countRow['total']; ?>
</h3>

<div class="table-container">

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Action</th>
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

<td>

<a class="edit-btn"
href="index.php?edit=<?php echo $row['id']; ?>">
Edit
</a>

<a class="delete-btn"
href="index.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this record?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</div>



<div class="search-box">

<button type="submit" form="searchForm">
🔍 Search
</button>

<form method="GET"
class="search-form"
id="searchForm">

<input type="text"
name="search"
placeholder="Type here...">

</form>

<a href="delete_all.php"
onclick="return confirm('⚠️ WARNING!\n\nDelete all records?')">
<button type="button" class="delete-all-btn">
🗑 Delete All
</button>
</a>

<a href="index.php">
<button type="button" class="show-all-btn">
📋 Show All
</button>
</a>

</div>




<button type="submit"
form="mainForm"
name="save">
💾 Save
</button>

<button type="submit"
form="mainForm"
name="update"
value="1">
✏️ Update Data
</button>

<a href="export.php">
<button type="button">
📤 Export
</button>
</a>

<a href="report.php<?php echo isset($_GET['search']) ? '?search='.urlencode($_GET['search']) : ''; ?>" target="_blank">
<button type="button">
📄 Report
</button>
</a>

<a href="import.php">
<button type="button">
📥 Import
</button>
</a>

<a href="logout.php">
<button type="button"
class="logout-btn">
🚪 Logout
</button>
</a>

<a href="change_password.php">
<button type="button">
🔑 Change Password
</button>
</a>

</div>

<script>


// CTRL + S and ALT + S Shortcut

document.addEventListener("keydown", function(e){

    // CTRL + S
    if(e.ctrlKey && (e.key === 's' || e.key === 'S'))
    {
        e.preventDefault();
        e.stopPropagation();

        alert("File Saved Successfully");
        document.querySelector('button[name="save"]').click();

        return false;
    }

    // ALT + S
    if(e.altKey && (e.key === 's' || e.key === 'S'))
    {
        e.preventDefault();
        e.stopPropagation();

        document.querySelector('button[name="save"]').click();

        return false;
    }

});

<script>

setTimeout(function(){
    document.getElementById("msg").style.display="none";
},3000);

document.addEventListener("keydown", function(e){

    if(e.ctrlKey && (e.key === 's' || e.key === 'S'))
    {
        e.preventDefault();
        document.querySelector('button[name="save"]').click();
    }

});

</script>

<div class="footer">
    <h3>Registration Management System</h3>
    <p><strong>Designed & Developed By Arun Kumar</strong></p>
</div>


</body>
</html>