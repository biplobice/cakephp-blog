<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-zoom-in'></i>"), 	array('action' => 'view', $category['Category']['id']), 	array('class' => 'btn btn-xs btn-default', 'escapeTitle' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link(__("<i class='glyphicon glyphicon-edit'></i>"), 		array('action' => 'edit', $category['Category']['id']), 	array('class' => 'btn btn-xs btn-primary', 'escapeTitle' => false, 'title' => 'Edit')); ?>
            <?php echo $this->Form->postLink(__("<i class='glyphicon glyphicon-trash'></i>"), 	array('action' => 'delete', $category['Category']['id']), 	array('class' => 'btn btn-xs btn-danger', 'escapeTitle' => false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # %s?', $category['Category']['name']))); ?>
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
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
