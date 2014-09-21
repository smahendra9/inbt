<table>
<tr>
<td>
<?php echo $this->Form->create(); ?>
<?php
	echo $this->Form->hidden('Category.id');
	echo $this->Form->input('Category.ara_name',array('label'=>' Name in Arabic'));
	echo $this->Form->input('Category.name',array('label'=>' Name in English'));
?>
<input type="button" style="width:8%" value="Cancel" onclick="window.location.href=	adminurl+'managecategory'" />
<?php echo $this->Form->end('Submit'); ?>


</td>
</tr>
</table>