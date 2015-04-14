<h3><?php echo $this->Session->flash(); ?></h3>
	<?php echo $this->Html->link('Entrar', array('controller' => 'users', 'action' =>'login'), array('class'=>'btn btn-primary')); ?>
