<?php echo $this->Html->link(__d('cforms', '%s View All Submissions', '<i class="icon icon-list"></i>'), array('action' => 'index'),array('class' => 'btn btn-small','escape' => false)); ?>
<h2>"<?php echo $submission['Cform']['name'];?>" Submission</h2>
<strong>Submitted On</strong> <?php echo $submission['Submission']['created'];?><br />
<strong>Page:</strong> <?php echo $submission['Submission']['page'];?><br />
<strong>IP:</strong> <?php echo $submission['Submission']['created'];?><br />

=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
<?php if (!empty($submission['SubmissionField'])):?>
	<table>
		
	<?php foreach($submission['SubmissionField'] as $field):?>
	<?php
	    $style = '';
	    if(strstr($field['form_field'], 'fs_')){
	    $style = 'style="background:#ececec"';
	    $field['form_field'] = $field['response'];
	    $field['response'] = null;
	    }
	    if(is_array($field['response'])){
		$field['response'] = implode(', ', $field['response']);
	    }
	    ?>
	<tr <?php echo $style;?>><td style="width:120px; padding-right: 10px; text-align: right"><strong><?php echo Inflector::humanize($field['form_field']);?></strong></td><td style="width:450px"><?php echo $field['response'];?></td></tr>
	<?php endforeach;?>
	</table>
<?php endif;?>
<?php echo $this->Html->link(__d('cforms', '%s View All Submissions', '<i class="icon icon-list"></i>'), array('action' => 'index'),array('class' => 'btn btn-small','escape' => false)); ?>