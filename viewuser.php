<?php
session_start();
$conn = mysqli_connect("localhost","root","","matrimony");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

/* DELETE USER */
if(isset($_POST['delete'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "DELETE FROM userdata WHERE email='$email'");
}

/* APPROVE USER */
if(isset($_POST['approve'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "UPDATE userdata SET status='Approved' WHERE email='$email'");
}

$sql = mysqli_query($conn,"SELECT * FROM userdata");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - User Management</title>

<style>
body{
    font-family: Arial;
    background:#f4f6f9;
}

h2{
    text-align:center;
    margin-top:20px;
}

table{
    width:95%;
    margin:30px auto;
    border-collapse: collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th{
    background:#2c3e50;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f2f2f2;
}

img{
    width:60px;
    height:60px;
    border-radius:50%;
    object-fit:cover;
}

.btn{
    padding:6px 10px;
    border:none;
    cursor:pointer;
    color:white;
    border-radius:4px;
    font-size:13px;
}

.approve{
    background:#27ae60;
}

.delete{
    background:#e74c3c;
}
</style>
</head>

<body>

<h2>Registered Users</h2>

<table>
<tr>
    <th>Photo</th>
    <th>Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($sql)) { ?>
<tr>
    <td>
        <img src="uploads/<?php echo $row['photo']; ?>">
    </td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>

        <!-- APPROVE FORM -->
        <?php if($row['status'] != 'Approved'){ ?>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
            <button type="submit" name="approve" class="btn approve">Approve</button>
        </form>
        <?php } ?>

        <!-- DELETE FORM -->
        <form method="POST" style="display:inline;" 
              onsubmit="return confirm('Are you sure you want to delete this user?');">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
            <button type="submit" name="delete" class="btn delete">Delete</button>
        </form>

    </td>
</tr>
<?php } ?>

</table>

</body>
</html>