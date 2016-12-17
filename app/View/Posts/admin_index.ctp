<div class="posts index">
	<h2><?php echo __('Posts'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['Category']['name'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-zoom-in'></i>"), 	array('action' => 'view', $post['Post']['id']), 	array('class' => 'btn btn-xs btn-default', 'escapeTitle' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), 		array('action' => 'edit', $post['Post']['id']), 	array('class' => 'btn btn-xs btn-primary', 'escapeTitle' => false, 'title' => 'Edit')); ?>
            <?php echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), 	array('action' => 'delete', $post['Post']['id']), 	array('class' => 'btn btn-xs btn-danger', 'escapeTitle' => false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # %s?', $post['Post']['title']))); ?>
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
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
