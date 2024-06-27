<?php 

include_once 'db.php';

$sql_select = "select * from register";
$data = mysqli_query($con,$sql_select);

 ?>

<form method="POST" id="frm">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="save"></td>
		</tr>
	</table>
</form>

 <table border="">
 	<th>ID</th>
 	<th>Name</th>
 	<th>Email</th>
 	<th>Password</th>
 	<tbody id="ans">
 	<?php while($row = mysqli_fetch_assoc($data)){ ?>

	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['password'] ?></td>
		<td><a href="javascript:void(0);" delete_id="<?php echo $row['id'] ?>" class="delete">Delete</a></td>
	</tr>

	<?php } ?>

 	</tbody>
 </table>

<script type="text/javascript" src="js/jquery-3.7.1.js"></script>
<script type="text/javascript">
	$(document).on('submit','#frm',function(e){
		e.preventDefault();
		var frm_data = $('#frm').serialize();
		$.ajax({
			type:"POST",
			url:"insert.php",
			data:frm_data,
			success:function(res){
				$('#ans').html(res);
				$("#frm")[0].reset();
			}
		})
	})

	$(document).on('click','.delete',function(){
		var id = $(this).attr('delete_id');
		$.ajax({
			type:"get",
			url:"insert.php",
			data:{"d_id":id},

			success:function(res){
				$('#ans').html(res);
			}
		})
	})
</script>