<div class="panel" style="text-align: center">
	<h3>Cadastro no Site</h3>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h4>Preencha nosso formulário de cadastro</h4>
    </div>
</div>

<div class="row" style="margin-top: 20px">
    <div class="panel col-md-6 col-md-offset-3" style="">
      <br />
    	<?php echo $this->Form->create('User', array('role' => 'form')); ?>
    	<div class="form-group">
      	<?php echo $this->Form->input('name', array('label' => 'Nome', 'placeholder' => 'Digite seu Nome', 'class' => 'form-control')); ?>
    	</div>

    	<div class="form-group">
      	<?php echo $this->Form->input('email', array('label' => 'Email', 'placeholder' => 'Digite seu Email', 'class' => 'form-control')); ?>
    	</div>

    	<div class="form-group">
      	<?php echo $this->Form->input('password', array('label' => 'Senha', 'placeholder' => 'Digite uma Senha', 'class' => 'form-control')); ?>
    	</div>

    	<div class="form-group">
        	<?php echo $this->Form->input('password_confirm', array('label' => 'Confirme a Senha', 'placeholder' => 'Digite sua Senha novamente', 'type' => 'password', 'class' => 'form-control')); ?>
     	</div>

  	  <?php echo $this->Form->end(array('label'=> 'CONCLUIR CADASTRO', 'class'=>'btn btn-primary', 'style'=>'width: 100%', 'id' => 'btn_register', 'data-loading-text' => 'ENVIANDO CADASTRO ...')); ?> 
        <br />
      <div style="text-align: right"><?php echo $this->Html->link('Já sou cadastrado, entrar', array('controller' => 'users', 'action' =>'login'), array('class'=>'')); ?></div>
      <br />
 	</div>
</div>
