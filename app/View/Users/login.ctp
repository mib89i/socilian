<div class="panel" style="text-align: center">
    <h3>Acessar meu cadastro</h3>
</div>
<br />

<div class="row" style="margin-top: 20px">
    <div class="panel col-md-6 col-md-offset-3" style="">
      <br />
    	<?php echo $this->Form->create('User', array('role' => 'form')); ?>

    	<?php //echo $this->session->flash('auth'); ?>

    	<?php echo $this->session->flash(); ?>
    	
    	<div class="form-group">
      	<?php echo $this->Form->input('email', array('label' => 'Email', 'placeholder' => 'Digite seu Email', 'class' => 'form-control')); ?>
    	</div>

    	<div class="form-group">
      	<?php echo $this->Form->input('password', array('label' => 'Senha', 'placeholder' => 'Digite uma Senha', 'class' => 'form-control')); ?>
    	</div>
    	
      <div class="checkbox">
        <label>
          <?php //echo $this->Form->checkbox('logged', array('value' => TRUE)); ?> <!-- Manter Conectado -->
        </label>
        <label style="float: right">
          <a href="#" data-toggle="modal" data-target="#modalResetPass">Esqueci minha senha</a>
        </label>
      </div>
       		
    	<?php echo $this->Form->end(array('label'=> 'ENTRAR', 'class'=>'btn btn-primary btn-block', 'id' => 'btn_register', 'data-loading-text' => 'VALIDANDO ...')); ?> 
      <br />
      <div style="text-align: center"><h6>ou</h6></div>
      <br />
      <?php echo $this->Html->link('NÃO TENHO CADASTRO', array('controller' => 'users', 'action' =>'register'), array('class'=>'btn btn-default btn-block')); ?>
 	</div>
</div>

<!-- Modal Esqueci minha Senha -->
<div class="modal fade" id="modalResetPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <?php echo $this->Form->create(null, 
        array('role' => 'form', 'url' => array('controller' => 'users', 'action' => 'reset_pass'))); 
      ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" id="myModalLabel">Recuperar minha Senha</h4>
      </div>

      <div class="modal-body">
        <div class="form-group">
        <?php echo $this->Form->input('email', array('label' => 'Email', 'placeholder' => 'Digite seu Email para recuperar', 'class' => 'form-control')); ?>
        </div>
      </div>

      <div class="modal-footer">
          <?php echo $this->Form->end(
                      array('label'=> 'Recuperar Senha', 'class'=>'btn btn-primary', 'id' => 'btn_register', 'data-loading-text' => 'ATUALIZANDO CADASTRO ...')); 
          ?> 
      </div>
    </div>
  </div>
</div>
