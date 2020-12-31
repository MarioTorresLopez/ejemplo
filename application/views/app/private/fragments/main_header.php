<?php
/**
* Header principald de la aplicación
*
* Fragmento que contiene el header principal de la aplicación, menus secundarios derechos 
* y notificaciones
* 
* @since      1.0
* @version    1.0
* @internal   El uso de este fragmento solo es posible por medio de una vista            
* @package    application.views
* @subpackage app.private.fragments
* @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
* @uses       ./application/views/app/private/main_view.php
*/
?>
<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            <?=app_title()?>
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">AIDE</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscar en AIDE" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="<?=base_url()?>app/logout/">Cerrar sesión</a>
                    </li>
                    <li>
                        <a class="" href="<?= base_url()?>app/micuenta">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                        <i class="pe-7s-speaker"></i>
                        <?php
                        $contn=0;
                        if(!is_null($notificaciones)):
                            foreach($notificaciones as $noti):
                            if($noti->leido==0):
                            $contn++;
                            endif;
                            endforeach; 
                        ?>
                        <!--<span class="label label-success"><?= $contn?></span>-->
                        <?php
                        endif;
                        if($contn!=0):
                        ?>
                        <span class="label label-success"><?= $contn?>
                        <?php
                        endif;
                        ?>    
                    </a>
                    <ul class="dropdown-menu hdropdown animated flipInX">
                        <div class="title">
                            Tienes <?= $contn?> mensajes nuevos
                        </div>
                        <?php
                        if(!is_null($notificaciones)):
                        foreach($notificaciones as $notidatos):
                        ?>
                        <li>
                            <?php if($notidatos->tipo==1):?>
                            <a href="<?= base_url()?>analista/solicitud_de_cuentas_aspirantes" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                                Nueva solicitud de cuenta.
                            </a> 
                            <?php
                            endif;
                            if($notidatos->tipo==2):   
                            ?>
                            <a href="" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                                Bienvenido.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==3):
                            ?>
                            <a href="<?= base_url()?>analista/gestion_institucion/gestion_instituciones" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Nueva solictud de incorporación.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==4):
                            ?>
                            <a href="<?= base_url()?>app/eventos" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Solicitud de cita para el expediente <?=$notidatos->folio?>
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==5):
                            ?>
                            <a href="<?= base_url()?>usuario/tramite/documento_institucion_aspirante/<?=$notidatos->folio?>" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Solicitud para iniciar trámite de incorporación aceptada.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==6):
                            ?>
                            <a href="#">
                               Incorporación rechazada.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==7):
                            ?>
                            <a href="<?= base_url()?>analista/gestion_institucion/gestion_instituciones" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?>  data-id="<?=$notidatos->idnotificacion?>">
                               Nuevo expediente asignado.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==8):
                            ?>
                            <a href="<?= base_url()?>usuario/tramite/documento_institucion_aspirante/<?=$notidatos->folio?>" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Tienes una nueva cita programada con <?= $notidatos->nomanalista?>.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==9):
                            ?>
                            <a href="<?= base_url()?>usuario/tramite/documento_institucion_aspirante/<?=$notidatos->folio?>" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Se han revisado todos los documentos.
                            </a>
                            <?php
                            endif;
                            if($notidatos->tipo==10):
                            ?>
                            <a href="" <?php if($notidatos->leido==0){ ?>class="noti noti1"<?php } else{?>class="noti"<?php }?> data-id="<?=$notidatos->idnotificacion?>">
                               Problemas CE.
                            </a>
                            <?php
                            endif;
                            ?>
                            
                        </li>
                        <?php    
                        endforeach;
                        endif;
                        ?>
                        <!--<li class="tittle"><a href="#">See All Messages</a></li>-->
                        <a href="<?= base_url() ?>app/notificacion">
                        <div class="title">
                            Ver todos los mensajes
                        </div>
                        </a>    
                    </ul>
                </li>
                <?php if(isset($app_right_sidebar)) : ?>
                    <li>
                        <a href="#" id="sidebar" class="right-sidebar-toggle">
                            <i class="pe-7s-upload pe-7s-news-paper"></i>
                        </a>
                    </li>
               <?php endif;  ?>
                <li class="dropdown">
                    <a href="<?= base_url() ?>app/logout">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
