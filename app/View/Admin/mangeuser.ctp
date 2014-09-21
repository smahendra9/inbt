<table>
<tr>
	<td>Name</td>
	<td>Email</td>
	<td>Password</td>
	<td>Default Language</td>
	<td>Status</td>
	<td>Action	</td>
</tr>
<?php
foreach($users as $user){ ?>
<tr>
	<td><?php echo $user['User']['name'];?></td>
	<td><?php echo $user['User']['email'];?></td>
	<td><?php echo base64_decode($user['User']['password']);?></td>
	<td><?php echo $user['User']['language'];?></td>
	<td><?php echo $user['User']['status'];?></td>
	<td><br />
	<input type="button" value="Edit" onclick="window.location.href = adminurl+'edituser/<?php echo $user['User']['id']; ?>'" name="edit" /><br />
    <input type="button" onclick="deleteuser('<?php echo $user['User']['id']; ?>');" value="Delete" name="delete" /></td>
</tr>	
<?php } ?>
<tr>
<td colspan="6">
<?php $this->App->adminpaging($this->Paginator); ?>
</td>
</tr>
</table>

<script>
	function deleteuser(id){
		var r = confirm("Do you want to delete?");
		if(r){
			window.location.href = adminurl+'deleteuser/'+id;
		}
	}
</script>
