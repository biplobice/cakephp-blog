<div class="userHistories view">
<h2><?php echo __('User History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userHistory['UserHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userHistory['User']['name'], array('controller' => 'users', 'action' => 'view', $userHistory['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($userHistory['UserHistory']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logout'); ?></dt>
		<dd>
			<?php echo h($userHistory['UserHistory']['logout']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User History'), array('action' => 'edit', $userHistory['UserHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User History'), array('action' => 'delete', $userHistory['UserHistory']['id']), array(), __('Are you sure you want to delete # %s?', $userHistory['UserHistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
