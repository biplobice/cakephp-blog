  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('MyBlog Admin Panel', '/admin/', array('class' => 'navbar-brand')); ?>
        </div>
        <?php if(AuthComponent::user('id')): ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span>Logged in as <?= AuthComponent::user('username') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-user"></i> Profile'), array('controller' => 'users', 'action' => 'view', AuthComponent::user('id')), array('escapeTitle' => false)); ?></li>                        
                        <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-cog"></i> Change Password'), array('controller' => 'users', 'action' => 'change_password', AuthComponent::user('id')), array('escapeTitle' => false)); ?></li>                        
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-off"></i> Logout'), array('controller' => 'users', 'action' => 'logout'), array('escapeTitle' => false)) ?></li>  
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <?php endif; ?>
    </div>
  </nav>
