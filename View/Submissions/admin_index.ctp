<?php
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => $this->Theme->getIcon('home')))
	->addCrumb(__d('cforms', 'Submissions'), '/' . $this->request->url);

$this->append('search', $this->element('admin/submissions_search'));


$this->start('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id', __d('croogo', 'Id')),
		$this->Paginator->sort('cform', __d('croogo', 'Form')),
		$this->Paginator->sort('created', __d('croogo', 'Created')),
		$this->Paginator->sort('ip', __d('croogo', 'IP')),
		''
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
?>
	<tbody>
	<?php foreach ($submissions as $submission): ?>
		<tr>
			<td><?php echo $submission['Submission']['id']; ?></td>
			<td>
				<span>
					<?php
					echo $this->Html->link($submission['Cform']['name'], array(
						'controller' => 'Cforms',
						'action' => 'edit',
						$submission['Cform']['id']
					));
					?>
				</span>
			</td>
			<td>
				<?php echo $submission['Submission']['created']; ?>
			</td>
			<td>
				<?php echo $submission['Submission']['ip']; ?>
			</td>
			<td>
				<div class="item-actions">
					<?php
					echo $this->Croogo->adminRowActions($submission['Submission']['id']);

					echo ' ' . $this->Croogo->adminRowAction('',
							array('action' => 'view', $submission['Submission']['id']),
							array('icon' => $this->Theme->getIcon('envelope'), 'tooltip' => __d('croogo', 'View this item'))
						);

					echo ' ' . $this->Croogo->adminRowAction('',
							array('action' => 'delete', $submission['Submission']['id']),
							array('icon' => $this->Theme->getIcon('delete'), 'tooltip' => __d('croogo', 'Delete this item'))
						);

					?>
				</div>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
<?php
$this->end();