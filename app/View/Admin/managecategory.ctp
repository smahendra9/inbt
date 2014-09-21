<table>
<tr>
	<td>
	<?php
	
		echo $this->Html->link('Add Main Category',array('controller'=>'admin','action'=>'addcategory'));
	?>
	<ul>
		<?php 
		foreach($category as $key => $cat){
			$arb = $catlist[$key]['Category']['ara_name'];
		?>
			<li><?php echo $cat." | ".$arb; ?> <?php echo $this->Html->link('Edit',array('controller'=>'admin','action'=>'editcategory/'.$key))?> | 
			<?php echo $this->Html->link('Delete',
                                        array('controller' => 'admin', 'action' => 'deletecategory/'.$key),
                                        array('onclick'=>'return confirm("Are you sure?");'))?>
			 <?php
			 	$pos = strpos($cat,'&nbsp;');
			 	if($pos === false){
					echo " | ".$this->Html->link('Add Sub Category',array('controller'=>'admin','action'=>'addcategory/'.$key));
				}
			 ?>							
			</li>
		<?php }?>
	</ul>
	</td>
</tr>
</table>