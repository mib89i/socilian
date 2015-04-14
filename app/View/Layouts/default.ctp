<!DOCTYPE html>
<html lang='pt-br'>
    <head>
	<?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- TEMA ORIGINAL DO BOOTSTRAP -->
        <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->

        <!-- TEMA YUPI -->
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/yeti/bootstrap.min.css" rel="stylesheet">         
        <title>
            <?php //echo $this->fetch('title'); ?>
            <?php echo $title_for_layout; ?>
        </title>
	<?php
            echo $this->Html->meta('icon');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
	?>
        <style>
            .bg {
                background: url(/publ/img/background02.jpg) no-repeat center center;
                position: fixed;
                width: 100%;
                height: 550px; /*same height as jumbotron */
                top:0;
                left:0;
                z-index: -1;
              }
              
            .bg2 {
                background: url(/publ/img/background01.jpg) no-repeat center center;
                position: absolute;
                width: 100%;
                height: 500px; /*same height as jumbotron */
                z-index: -1;
              }
              
            .jumbotron {
                margin-bottom: 0px;
                height: 550px;
                text-shadow: black 0.3em 0.3em 0.3em;
                background:transparent;
            }
            
            .semi-transparent{
                background-color: rgba(245, 245, 245, 0.4);
            }
            
            .error-message{
                background: #fe7070;
                padding: 5px;
                color: white;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default" style="margin: 0px">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                    <?php echo $this->Html->Link('PUBL - Compartilhando Ideias', array('controller' => 'home', 'action' => '/'), array('class' => 'navbar-brand'))?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'home') )?'active' : 'inactive' ?>">
                            <?php echo $this->Html->Link('INÍCIO', array('controller' => 'home', 'action' => 'index')); ?>
                        </li>
                        <li class="<?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'quemsomos') )?'active' : 'inactive' ?>">
                            <?php echo $this->Html->Link('QUEM SOMOS', array('controller' => 'quemsomos', 'action' => 'index')); ?>
                        </li>
                        <li class="<?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'portifolio') )?'active' : 'inactive' ?>">
                            <?php echo $this->Html->Link('PORTIFÓLIO', array('controller' => 'home', 'action' => 'index')); ?>
                        </li>
                        <li class="<?php echo (!empty($this->params['controller']) && ($this->params['controller'] == 'contato') )?'active' : 'inactive' ?>">
                            <?php echo $this->Html->Link('CONTATO', array('controller' => 'contato', 'action' => 'index')); ?>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MAIS<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->Link('MINHA CONTA', array('controller' => 'users', 'action' => 'login')); ?></li>
                                <li><a href="#">PROMOÇÕES</a></li>
                                <li class="divider"></li>
                                <li><a href="#">CADASTRO</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <div class="container-fluid">
            <?php echo $this->fetch('content'); ?>
        </div>

        <div class="container-fluid">
            <div class="row" style="background: #d887ff; height: 380px">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <h6 style="font-weight: bold">Tire suas Dúvidas</h6>
                            <p style="color: white">Cel. (16) 99302-6448</p>
                            <p style="color: white">Email. contato@publ.com.br</p>
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <h6 style="font-weight: bold">Navegue pelo Site</h6>
                            <p><?php echo $this->Html->link('Home', array('controller' => 'home', 'action' => 'index'), array('style' => 'color: white')); ?></p>
                            <p><?php echo $this->Html->link('Quem Somos', array('controller' => 'home'), array('style' => 'color: white')); ?></p>
                            <p><?php echo $this->Html->link('Portifólio', array('controller' => 'home'), array('style' => 'color: white')); ?></p>
                            <p><?php echo $this->Html->link('Contato', array('controller' => 'contato', 'action' => 'index'), array('style' => 'color: white')); ?></p>
                            <p><?php echo $this->Html->link('Faça um Orçamento', array('controller' => 'orcamentos', 'action' => 'index'), array('style' => 'color: white')); ?></p>
                        </div>
                    </div>
                </div>
                        
                <hr style=""/>
                
                <div class="container" >
                    <div class="row">
                        <div class="col-md-12">
                            <h6 style="color: white">Direitos Reservados a PUBL®</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <?php echo $this->Html->script('jquery.mask.min', array('inline' => true)); ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            var jumboHeight = $('.jumbotron').outerHeight();
            function parallax(){
                var scrolled = $(window).scrollTop();
                $('.bg').css('height', (jumboHeight-scrolled) + 'px');
            }

            $(window).scroll(function(e){
                parallax();
            });
            
            $('.ddd_telefone').focus(function() {
                //$(this).mask('(99) 9999-9999?9');
                $(this).mask('(00) 0000-00009');
            });
            
            $('.ddd_telefone').focusout(function() {
                var phone, element;
                element = $(this);
                element.unmask();
                phone = element.val().replace(/\D/g, '');
                if (phone.length > 10) {
                    element.mask('(99) 99999-9999');
                } else {
                    element.mask('(99) 9999-9999');
                }
            });
        </script>
	<?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
