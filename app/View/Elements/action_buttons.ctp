<?php
echo $this->Html->link(__('View'), array('action' => 'view', $id));
echo $this->Html->link(__('Edit'), array('action' => 'edit', $id));
echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $id), array(), __('Are you sure you want to delete # %s?', $id));