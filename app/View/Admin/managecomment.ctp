<table>
<tr>
	<td>SNo.</td>
	<td>User Name</td>
	<td>Comment</td>
	<td>Likes</td>
	<td>Date</td>
	<td>Status</td>
	<td>Action</td>
</tr>
<?php
$i = 1;
foreach($comments as $comment){ 

?>
<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $comment['User']['name'];?></td>
	<td><?php echo $comment['Comment']['comment'] ?></td>
	<td><?php echo count($comment['Commentlike']); ?></td>
	<td><?php echo $this->App->formatdate($comment['Comment']['created']);?></td>
	<td><?php echo $comment['Comment']['status'];?></td>
	<td><input type="button" onclick="deleteuser('<?php echo $comment['Comment']['id']; ?>');" value="Delete" name="delete" /></td>
</tr>	
<?php } ?>
<td colspan="6">
<?php $this->App->adminpaging($this->Paginator); ?>
</td>
</table>

<script>
	function deleteuser(id){
		var r = confirm("Do you want to delete?");
		if(r){
			window.location.href = adminurl+'deletecomment/'+id;
		}
	}
</script>
