<ul class="nav nav-list"> 
  <li class="nav-header">Admin Menu</li>        
  <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-book"></i> Posts'), 		array('controller' => 'posts', 		'action' => 'index'), array('escapeTitle' => false)) ?></li>  
  <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-tag"></i> Categories'), 	array('controller' => 'categories', 'action' => 'index'), array('escapeTitle' => false)) ?></li>  
  <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-comment"></i> Comments'), 	array('controller' => 'comments', 	'action' => 'index'), array('escapeTitle' => false)) ?></li>
  <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-signal"></i> History'), 	array('controller' => 'user_histories','action' => 'index'), array('escapeTitle' => false)) ?></li>
  <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-user">	</i> Users'), 		array('controller' => 'users', 		'action' => 'index'), array('escapeTitle' => false)) ?></li>
</ul>
