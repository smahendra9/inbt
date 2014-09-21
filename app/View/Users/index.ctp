<?php echo $this->Form->create(); ?>
<?php
	echo $this->Form->input('User.name',array('label'=>'Name'));
	echo $this->Form->input('User.email',array('label'=>'Email'));
	echo $this->Form->input('User.telephone',array('label'=>'Telephone'));
?>
<?php echo $this->Form->end('Submit'); ?>