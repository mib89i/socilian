<div class="row" style="background: #e0e0e0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <h2 style="font-weight: bold">Contato</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <h2>Envie uma mensagem para nós.</h2>
                <h2>Dúvidas? Sugestões, fique a vontade em falar conosco!!</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                
                <?php echo $this->session->flash(); ?>
                <?php echo $this->Form->create('Contato', array('role' => 'form')); ?>
                <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control', 'style' => '', 'placeholder' => 'Nome')); ?>
                <?php echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'style' => '', 'placeholder' => 'E-mail')); ?>
                <?php echo $this->Form->input('title', array('label' => 'Título', 'class' => 'form-control', 'style' => 'font-weight: bold', 'placeholder' => 'Título da Mensagem')); ?>
                <?php echo $this->Form->input('text', array('type' => 'textarea', 'label' => 'Mensagem', 'class' => 'form-control', 'placeholder' => 'Digite sua mensagem')); ?>

                <?php echo $this->Form->end(array('label' => 'ENVIAR', 'class' => 'btn btn-success', 'style' => 'margin-top: 10px')); ?>
            </div>
            
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
</div>
<br />