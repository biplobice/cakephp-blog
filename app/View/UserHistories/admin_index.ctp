<div class="userHistories index">
	<h2><?php echo __('User Histories'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('logout'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($userHistories as $userHistory): ?>
	<tr>
		<td><?php echo h($userHistory['UserHistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userHistory['User']['name'], array('controller' => 'users', 'action' => 'view', $userHistory['User']['id'])); ?>
		</td>
		<td><?php echo h($userHistory['UserHistory']['login']); ?>&nbsp;</td>
		<td><?php echo h($userHistory['UserHistory']['logout']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-zoom-in'></i>"), 	array('action' => 'view', $userHistory['UserHistory']['id']), 	array('class' => 'btn btn-xs btn-default', 'escapeTitle' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), 		array('action' => 'edit', $userHistory['UserHistory']['id']), 	array('class' => 'btn btn-xs btn-primary', 'escapeTitle' => false, 'title' => 'Edit')); ?>
            <?php echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), 	array('action' => 'delete', $userHistory['UserHistory']['id']), 	array('class' => 'btn btn-xs btn-danger', 'escapeTitle' => false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # %s?', $userHistory['UserHistory']['id']))); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $this->element('paginate'); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
