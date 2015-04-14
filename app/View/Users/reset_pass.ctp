<div class="row">
	<div class="col-md-12">
		<h3>Preencha o formulário abaixo para alterar sua senha.</h3>
	</div>
</div>

<div class="row" style="margin-top:20px">
	<div class="col-md-4">
		<?php echo $this->Form->create(null, 
        	array('role' => 'form', 'url' => array('controller' => 'users', 'action' => 'reset_pass/'.$code_reset))); 
      	?>
		<div class="form-group">
			<h5>Email</h5>
			<h5 style="font-weight: bold"><?php echo $email_reset; ?></h5>
		</div>
    	<div class="form-group">
      	<?php echo $this->Form->input('password', array('label' => 'Senha', 'placeholder' => 'Digite sua nova Senha', 'class' => 'form-control', 'type' => 'password')); ?>
    	</div>

    	<div class="form-group">
      	<?php echo $this->Form->input('password_confirm', array('label' => 'Confirmar Senha', 'placeholder' => 'Confirme sua nova Senha', 'class' => 'form-control', 'type' => 'password')); ?>
    	</div>

	    <?php echo $this->Form->end(array('label'=> 'ENVIAR', 'class'=>'btn btn-primary', 'id' => 'btn_register', 'data-loading-text' => 'ENVIANDO ...')); ?> 
	</div>  
</div>
