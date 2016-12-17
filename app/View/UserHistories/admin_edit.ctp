<div class="userHistories form">
<?php echo $this->Form->create('UserHistory'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('login');
		echo $this->Form->input('logout');
		echo $this->Form->end($btn_success);
	?>
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserHistory.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UserHistory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
