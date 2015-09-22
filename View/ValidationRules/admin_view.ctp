<div class="validationRules view">
<h2><?php  __d('cforms', 'ValidationRule');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Rule'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['rule']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Message'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['message']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('cforms', 'Edit ValidationRule', true), array('action' => 'edit', $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'Delete ValidationRule', true), array('action' => 'delete', $validationRule['ValidationRule']['id']), null, sprintf(__d('cforms', 'Are you sure you want to delete # %s?', true), $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'List ValidationRules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'New ValidationRule', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __d('cforms', 'Related Form Fields');?></h3>
	<?php if (!empty($validationRule['FormField'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __d('cforms', 'Id'); ?></th>
		<th><?php __d('cforms', 'Name'); ?></th>
		<th><?php __d('cforms', 'Label'); ?></th>
		<th><?php __d('cforms', 'Type'); ?></th>
		<th><?php __d('cforms', 'Length'); ?></th>
		<th><?php __d('cforms', 'Null'); ?></th>
		<th><?php __d('cforms', 'Default'); ?></th>
		<th><?php __d('cforms', 'Cform Id'); ?></th>
		<th><?php __d('cforms', 'Required'); ?></th>
		<th class="actions"><?php __d('cforms', 'Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($validationRule['FormField'] as $formField):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $formField['id'];?></td>
			<td><?php echo $formField['name'];?></td>
			<td><?php echo $formField['label'];?></td>
			<td><?php echo $formField['type'];?></td>
			<td><?php echo $formField['length'];?></td>
			<td><?php echo $formField['null'];?></td>
			<td><?php echo $formField['default'];?></td>
			<td><?php echo $formField['cform_id'];?></td>
			<td><?php echo $formField['required'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('cforms', 'View', true), array('controller' => 'form_fields', 'action' => 'view', $formField['id'])); ?>
				<?php echo $this->Html->link(__d('cforms', 'Edit', true), array('controller' => 'form_fields', 'action' => 'edit', $formField['id'])); ?>
				<?php echo $this->Html->link(__d('cforms', 'Delete', true), array('controller' => 'form_fields', 'action' => 'delete', $formField['id']), null, sprintf(__d('cforms', 'Are you sure you want to delete # %s?', true), $formField['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('cforms', 'New Form Field', true), array('controller' => 'form_fields', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
