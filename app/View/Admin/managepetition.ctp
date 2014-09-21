<table>
<tr>
	<td>Username</td>
	<td>Whome for</td>
	<td>Title</td>
	<td>Want</td>
	<td>Status</td>
	<td>Action</td>
</tr>
<?php
foreach($petitions as $petition){ ?>
<tr>
	<td><?php echo $petition['User']['name'];?></td>
	<td><?php echo $petition['Petition']['whomefor'];?></td>
	<td><?php echo $petition['Petition']['title'];?></td>
	<td><?php echo $petition['Petition']['description'];?></td>
	<td><?php echo $petition['Petition']['status'];?></td>
	<td><br />
	<input type="button" value="Edit" onclick="window.location.href = adminurl+'editpetition/<?php echo $petition['Petition']['id']; ?>'" name="edit" /><br />
    <input type="button" onclick="deleteuser('<?php  echo $petition['Petition']['id']; ?>');" value="Delete" name="delete" /></td>
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
