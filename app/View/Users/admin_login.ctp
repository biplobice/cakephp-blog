<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array('inputDefaults' => array('div' => 'form-group', 'class' => 'form-control'))); ?>
        <fieldset>
            <legend><?php echo __('Please login to continue'); ?></legend>
            <?php
                echo $this->Form->input('username');
                echo $this->Form->input('password');
                echo $this->Form->submit('Login', array('class' => 'form-submit btn btn-lg btn-primary btn-block', 'title' => 'Login to continue'));                
            ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
</div>
