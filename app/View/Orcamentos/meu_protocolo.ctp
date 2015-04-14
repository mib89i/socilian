<?php if (!isset($orcamento)): ?>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="color:red">OPS ...</h1>
                <h2 class="text-center">Nenhum protocolo encontrado!!</h2>
                
                <p class="text-center" style="margin: 40px">
                    <?php echo $this->Html->image('icon-sad.png', array('class' => '')); ?>
                </p>
                
                <p class="text-center" style="margin: 40px">
                    <?php echo $this->Html->link('Tentar Novamente', array('controller' => 'orcamentos', 'action' => 'index'), array('class' => 'btn btn-success')); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="row" style="margin-bottom: 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Andamento do Protocolo</h2>
                <h3><?php echo $orcamento['Orcamento']['protocol']; ?></h3>
                <hr />
                <h5><?php echo $orcamento['Orcamento']['name']; ?></h5>
                <h5><?php echo $orcamento['Orcamento']['email']; ?></h5>
            </div>
            
            <div class="col-md-12">
                <h3 style="background: #9ee993; padding: 20px">Status em Análise</h3>
            </div>
        </div>
    </div>
</div>
    
<?php endif;
