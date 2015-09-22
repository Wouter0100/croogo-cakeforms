<div class="formFields view">
<h2><?php  __d('cforms', 'FormField');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Label'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['label']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Length'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['length']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Null'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['null']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Default'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['default']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Cform'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($formField['Cform']['name'], array('controller' => 'cforms', 'action' => 'view', $formField['Cform']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('cforms', 'Required'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['required']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('cforms', 'Edit FormField', true), array('action' => 'edit', $formField['FormField']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'Delete FormField', true), array('action' => 'delete', $formField['FormField']['id']), null, sprintf(__d('cforms', 'Are you sure you want to delete # %s?', true), $formField['FormField']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'List FormFields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'New FormField', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'List Cforms', true), array('controller' => 'cforms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'New Cform', true), array('controller' => 'cforms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'List Validation Rules', true), array('controller' => 'validation_rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('cforms', 'New Validation Rule', true), array('controller' => 'validation_rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __d('cforms', 'Related Validation Rules');?></h3>
	<?php if (!empty($formField['ValidationRule'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __d('cforms', 'Id'); ?></th>
		<th><?php __d('cforms', 'Rule'); ?></th>
		<th><?php __d('cforms', 'Message'); ?></th>
		<th class="actions"><?php __d('cforms', 'Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($formField['ValidationRule'] as $validationRule):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $validationRule['id'];?></td>
			<td><?php echo $validationRule['rule'];?></td>
			<td><?php echo $validationRule['message'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('cforms', 'View', true), array('controller' => 'validation_rules', 'action' => 'view', $validationRule['id'])); ?>
				<?php echo $this->Html->link(__d('cforms', 'Edit', true), array('controller' => 'validation_rules', 'action' => 'edit', $validationRule['id'])); ?>
				<?php echo $this->Html->link(__d('cforms', 'Delete', true), array('controller' => 'validation_rules', 'action' => 'delete', $validationRule['id']), null, sprintf(__d('cforms', 'Are you sure you want to delete # %s?', true), $validationRule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('cforms', 'New Validation Rule', true), array('controller' => 'validation_rules', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
