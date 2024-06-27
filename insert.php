<?php 
include_once 'db.php';

if (isset($_GET['d_id'])) {
	$id = $_GET['d_id'];
	$sql_delete = "delete from register where id='$id'";
	mysqli_query($con,$sql_delete);
}

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
 	$sql_insert="insert into register values(null,'$name','$email','$password')"; 
	mysqli_query($con,$sql_insert);
}

$sql_select = "select * from register";
$data = mysqli_query($con,$sql_select);

while($row = mysqli_fetch_assoc($data)){ ?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['password'] ?></td>
		<td><a href="javascript:void(0);" delete_id="<?php echo $row['id'] ?>" class="delete">Delete</a></td>
	</tr>
<?php } ?>