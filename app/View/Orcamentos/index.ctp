<div class="row" style="background: #e0e0e0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <h2 style="font-weight: bold">Solicitar Orçamento</h2>
            </div>
        </div>
    </div>
</div>

<hr />

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <?php echo $this->session->flash(); ?>
                <?php echo $this->Form->create('Orcamento', array('role' => 'form')); ?>
                <?php echo $this->Form->input('name', array('label' => 'Nome', 'class' => 'form-control', 'style' => '', 'placeholder' => 'Nome')); ?>
                <?php echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'style' => '', 'placeholder' => 'E-mail')); ?>
                <?php echo $this->Form->input('phone', array('label' => 'Telefone (opcional)', 'class' => 'form-control ddd_telefone', 'style' => '', 'placeholder' => 'Telefone')); ?>
                <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => 'Faça uma breve descrição do seu projeto', 'class' => 'form-control', 'placeholder' => 'Como quero o meu site')); ?>

                <?php echo $this->Form->end(array('label' => 'ENVIAR', 'class' => 'btn btn-success', 'style' => 'margin-top: 10px')); ?>
            </div>
            <br />
            <div class="col-md-4 col-sm-4" style="background: #e0e0e0; ">
                <p style="padding: 5px"><h4>Pesquisar meu Protocolo</h4></p>
                <?php echo $this->Form->create('Orcamento', array('role' => 'form', 'action' => 'meu_protocolo')); ?>
                <?php echo $this->Form->input('protocol', array('label' => '', 'class' => 'form-control', 'style' => '', 'placeholder' => 'Digite seu Protocolo')); ?>
                <?php echo $this->Form->end(array('label' => 'Verificar', 'class' => 'btn btn-danger btn-sm', 'style' => 'margin-top: 10px')); ?>
                <br />
            </div>
        </div>
    </div>
</div>

<br />