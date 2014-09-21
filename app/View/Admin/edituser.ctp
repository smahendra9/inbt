<?php echo $this->Form->create(); ?>
<?php
	echo $this->Form->hidden('User.id');
	echo $this->Form->input('User.name',array('label'=>'اسم / Name'));
	echo $this->Form->input('User.email',array('label'=>'كلمة المرور / email'));
	echo $this->Form->input('User.password',array('type'=>'text','label'=>'كلمة المرور / Password'));
	echo $this->Form->input('User.status',array('type'=>'select','options'=>array('Active'=>'Active','Inactive'=>'Inactive'),'label'=>'كلمة المرور / Status'));
?>
<?php echo $this->Form->end('Submit'); ?>