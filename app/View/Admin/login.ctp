<?php echo $this->Form->create(); ?>
<?php
	echo $this->Form->input('Admin.username',array('label'=>'اسم / Name'));
	echo $this->Form->input('Admin.password',array('label'=>'كلمة المرور / Password'));
?>
<?php echo $this->Form->end('Submit'); ?>