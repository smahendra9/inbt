<?php echo $this->Form->create('User', array('action' => 'index')); ?>
<?php
	echo $this->Form->input('name',array('label'=>'Name'));
	echo $this->Form->input('email',array('label'=>'Email'));
	echo $this->Form->input('telephone',array('label'=>'Telephone'));
?>
<?php echo $this->Form->end('Submit'); ?>