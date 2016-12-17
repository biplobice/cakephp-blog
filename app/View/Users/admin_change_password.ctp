<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Change Password'); ?></legend>
    <?php
        echo $this->Form->create('User');
        echo $this->Form->hidden('id', array('value' => AuthComponent::user('id')));
        echo $this->Form->hidden('username', array('value' => AuthComponent::user('username')));
        echo $this->Form->input('current_password', array('type' => 'password'));
        echo $this->Form->input('new_password', array('type' => 'password'));
        echo $this->Form->input('confirm_new_password', array('type' => 'password'));
        echo $this->Form->end($btn_success);
    ?>
    </fieldset>