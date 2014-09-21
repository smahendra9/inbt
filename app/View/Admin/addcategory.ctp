<table>
<tr>
<td>
<?php echo $this->Form->create(); ?>
<?php
	if(isset($id)){
		echo $this->Form->hidden('Category.parent_id',array('value'=>$id));
	}
	echo $this->Form->input('Category.ara_name',array('label'=>'Name in arabic'));
	echo $this->Form->input('Category.name',array('label'=>'Name in english'));
?>
<?php echo $this->Form->end('Submit'); ?>
</td>
</tr>
</table>