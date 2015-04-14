<div class="bg"></div>

<div class="row">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-5 col-xs-12">
                    <h2 style="color: white">Compartilhamos nossas ideias com você...</h2>
                    <h3 style="color: white">Você compartilha as suas com a gente!</h3>
                </div>
                <div class="col-sm-7 col-md-7 col-xs-12">
                    <div class="panel semi-transparent" style="padding: 10px">

                        <h3 style="color: white">Solicite seu site agora!</h3>
                        <?php echo $this->Form->create('Orcamento', array('type' => 'get', 'action' => 'index')); ?>
                        <?php echo $this->Form->input('name', array('label' => '', 'class' => 'form-control', 'style' => '', 'placeholder' => 'Nome')); ?>
                        <?php echo $this->Form->input('email', array('label' => '', 'class' => 'form-control', 'style' => '', 'placeholder' => 'E-mail')); ?>

                        <?php echo $this->Form->end(array('label' => 'ENVIAR', 'class' => 'btn btn-success', 'style' => 'margin-top: 10px')); ?>
                    </div>

                </div>
            </div>
        </div>
        <?php //echo $this->Html->image('background01.jpg', array('class' => 'img-responsive')); ?>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12" style="">
                <h2 style="margin-top: 0px">Querendo expandir seus negócios?</h2>
                <h2><small>Temos a solução que você precisa...</small></h2>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php echo $this->Html->link('SOLICITE UM ORÇAMENTO', array('controller' => 'orcamentos'), array('class' => 'btn btn-danger btn-block')); ?>
            </div>
        </div>
    </div>
</div>

<br />

<div class="row" style="background: #e0e0e0">
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel" style="padding: 10px; height: 350px">
                    <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
                    <br />
                    <h4>Design Responsivo</h4>
                    <h5>Tenha um site que se adequa ao seu PC, notebook, tablet, smartphone ...</h5>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="panel" style="padding: 10px; height: 350px">
                    <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
                    <br />
                    <h4>Institucional</h4>
                    <h5>A melhor maneira de divulgar sua empresa, produtos, serviços e mais ... Expanda seus negócios e conquiste novos clientes.</h5>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="panel" style="padding: 10px; height: 350px">
                    <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
                    <br />
                    <h4>Sites Gerenciáveis</h4>
                    <h5>Uma área administrativa para você gerenciar o conteúdo do seu site. Sim, ele pode ficar do jeito que quiser.</h5>
                </div>
            </div>    
        </div>
    </div>
</div>

    
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
                <h2>Personalizamos seu site de acordo com suas necessidades!!</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Alguns de nossos Planos Fixos</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="height: 280px; background: #f4f4f4">
                    <p class="bg-primary" style="padding: 15px">SITE INSTITUCIONAL</p>
                    <ul>
                        <li>Totalmente Responsivo</li>
                        <li>Home Page</li>
                        <li>Quem Somos</li>
                        <li>Serviços</li>
                        <li>Formulário para Contato</li>
                        <li>Localização</li>
                    </ul>
                </div>
                <p><?php echo $this->Html->link('R$ 500,00* ou 5 x R$ 100,00', array('controller' => 'orcamentos/plano_simples'), array('class' => 'btn btn-danger btn-block')); ?></p>
                <p>ou <?php echo $this->Html->link(' fazer outra proposta para meu SITE INSTITUCIONAL', array()); ?></p>
                <p><small>*Desconto de 10% no pagamento à vista</small></p>
            </div>
            
            <div class="col-md-4">
                <div style="height: 280px; background: #f4f4f4">
                    <p class="bg-primary" style="padding: 15px">SITE GERENCIÁVEL (simples)</p>
                    <ul>
                        <li>Totalmente Responsivo</li>
                        <li>6 Páginas</li>
                        <li>Galeria de Fotos</li>
                        <li>Área administrativa para gerenciamento de Conteúdo</li>
                    </ul>
                </div>
                <p><?php echo $this->Html->link('R$ 700,00* ou 7 x R$ 100,00', array('controller' => 'orcamentos/plano_site_simples'), array('class' => 'btn btn-danger btn-block')); ?></p>
                <p>ou <?php echo $this->Html->link(' fazer outra proposta para meu SITE GERENCIÁVEL', array()); ?></p>
                <p><small>*Desconto de 10% no pagamento à vista</small></p>
            </div>
            
            <div class="col-md-4">
                <div style="height: 280px; background: #f4f4f4">
                    <p class="bg-primary" style="padding: 15px">SITE GERENCIÁVEL (completo)</p>
                    <ul>
                        <li>Totalmente Responsivo</li>
                        <li>Páginas Ilimitadas</li>
                        <li>Galeria de Fotos</li>
                        <li>Sistema de Busca</li>
                        <li>Comentários</li>
                        <li>Enquetes</li>
                        <li>Publicidades</li>
                        <li>Área administrativa para gerenciamento de Conteúdo</li>
                    </ul>
                </div>
                <p><?php echo $this->Html->link('R$ 1.100,00* ou 10 x R$ 110,00', array('controller' => 'orcamentos/plano_site_completo'), array('class' => 'btn btn-danger btn-block')); ?></p>
                <p>ou <?php echo $this->Html->link(' fazer outra proposta para meu SITE GERENCIÁVEL COMPLETO', array()); ?></p>
                <p><small>*Desconto de 10% no pagamento à vista</small></p>                
            </div>
        </div>
    </div>
</div>

<hr />

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="font-style: italic">Alguns layouts de projetos</h3><br />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
            </div>
            <div class="col-md-3">
                <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
            </div>
            <div class="col-md-3">
                <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
            </div>
            <div class="col-md-3">
                <?php echo $this->Html->image('responsive-web-design.jpg', array('class' => 'img-responsive')); ?>
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="font-weight: bold">Para outros PLANOS</h2><br />
                <?php echo $this->Html->link('SOLICITE UM ORÇAMENTO', array('controller' => 'orcamentos', 'action' => 'index'), array('class' => 'btn btn-default')); ?>
            </div>
        </div>
    </div>
</div>

<br /><br />
<div class="row">
    <div class="bg2"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <p>
                    <h5 style="font-weight: bold; float: right" class="hidden-xs">Nossas Redes Socias</h5>
                    <h5 style="font-weight: bold; float: right; color: white" class="visible-xs-block">Nossas Redes Socias</h5>
                </p><br /><br />
                <?php echo $this->Html->image('facebook-round.png', array('class' => 'img-responsive', 'style' => 'float: right')); ?>
                <?php echo $this->Html->image('google_plus-round.png', array('class' => 'img-responsive', 'style' => 'float: right')); ?>
            </div>
        </div>
    </div>
</div>

<br />