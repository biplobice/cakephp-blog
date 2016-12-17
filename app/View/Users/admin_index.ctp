<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('avatar'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($user['User']['status']) ? '<i class="glyphicon glyphicon-ok"></i>' : '<i class="glyphicon glyphicon-remove"></i>' ; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-zoom-in'></i>"), 	array('action' => 'view', $user['User']['id']), 	array('class' => 'btn btn-xs btn-default', 'escapeTitle' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), 		array('action' => 'edit', $user['User']['id']), 	array('class' => 'btn btn-xs btn-primary', 'escapeTitle' => false, 'title' => 'Edit')); ?>
            <?php echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), 	array('action' => 'delete', $user['User']['id']), 	array('class' => 'btn btn-xs btn-danger', 'escapeTitle' => false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # %s?', $user['User']['username']))); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Histories'), array('controller' => 'user_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User History'), array('controller' => 'user_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
