<?php echo $this->Form->create(); 
?>
<?php
	echo $this->Form->hidden('Petition.id');
	echo $this->Form->input('Petition.whomefor',array('label'=>'Whom do you want to Petition'));
	echo $this->Form->input('Petition.title',array('label'=>'Title for Petition'));
	echo $this->Form->input('Petition.description',array('type'=>'text','label'=>'What do you want to do them'));
	echo $this->Form->input('Petition.category_id',array('type'=>'select','options'=>$category,'selected'=>$this->data['Petition']['category_id'],'label'=>'Category'));
	echo $this->Form->input('Petition.user_id',array('type'=>'select','options'=>$users,'selected'=>$this->data['Petition']['user_id'],'label'=>'Petition By'));
	echo $this->Form->input('Petition.image',array('type'=>'text','label'=>'Image'));
	echo $this->Form->input('Petition.video',array('type'=>'text','label'=>'Video'));
	echo $this->Form->input('Petition.support',array('type'=>'text','label'=>'Supporter'));
	echo $this->Form->input('Petition.isfeatured',array('type'=>'checkbox','checked'=>$this->data['Petition']['isfeatured'],'label'=>'Is Featured'));
	echo $this->Form->input('Petition.isrecommandate',array('type'=>'checkbox','checked'=>$this->data['Petition']['isrecommandate'],'label'=>'Is recommadate'));
	echo $this->Form->input('Petition.language',array('type'=>'select','options'=>array('ENG'=>'English','ARA'=>'Arabic'),'selected'=>$this->data['Petition']['language'],'label'=>'Petition Language'));
	echo $this->Form->input('Petition.status',array('type'=>'select','options'=>array('Active'=>'Active','Inactive'=>'Inactive'),'label'=>'كلمة المرور / Status'));
?>
<?php echo $this->Form->end('Submit'); ?>