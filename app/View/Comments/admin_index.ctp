<div class="comments index">
	<h2><?php echo __('Comments'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($comments as $comment): ?>
	<tr>
		<td><?php echo h($comment['Comment']['id']); ?>&nbsp;</td>
		<td><?php echo h($comment['Comment']['comment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
		</td>
		<td><?php echo h($comment['Comment']['created']); ?>&nbsp;</td>
		<td><?php echo h($comment['Comment']['updated']); ?>&nbsp;</td>
		<td class="text-center"><?php echo h($comment['Comment']['status']) ? '<i class="glyphicon glyphicon-ok"></i>' : '<i class="glyphicon glyphicon-remove"></i>' ; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-zoom-in'></i>"), 	array('action' => 'view', $comment['Comment']['id']), 	array('class' => 'btn btn-xs btn-default', 'escapeTitle' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), 		array('action' => 'edit', $comment['Comment']['id']), 	array('class' => 'btn btn-xs btn-primary', 'escapeTitle' => false, 'title' => 'Edit')); ?>
            <?php echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), 	array('action' => 'delete', $comment['Comment']['id']), 	array('class' => 'btn btn-xs btn-danger', 'escapeTitle' => false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # %s?', $comment['Comment']['comment']))); ?>
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
		<li><?php echo $this->Html->link(__('New Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
