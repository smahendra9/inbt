<table>
<tr>
	<td><?php echo $this->Html->link("User Management",array('controller'=>'admin','action'=>"mangeuser")) ?></td>
	<td><?php echo $this->Html->link("Category Management",array('controller'=>'admin','action'=>"managecategory")) ?></td>
	<td><?php echo $this->Html->link("Comment Management",array('controller'=>'admin','action'=>"managecomment")) ?></td>
	<td><?php echo $this->Html->link("Petition Management",array('controller'=>'admin','action'=>"managecategory")) ?></td>
	<td><?php echo $this->Html->link("Logout",array('controller'=>'admin','action'=>"logout")) ?></td>
</tr>
</table>