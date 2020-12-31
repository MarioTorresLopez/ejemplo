<?php
/**
 * Menu (Nav) principal de la aplicación
 *
 * Fragmento que contiene el menu de navegacion  principal de la aplicación, 
 * el contenido se genera de manera dinámica a partir de los permisos ligados 
 * al usuario
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
<!-- Navigation -->
<aside id="menu" style="font-family: 'Soberana Sans';">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="<?= base_url() ?>static/images/logos/logo_aide_sm.png" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">AIDE</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Opciones<b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="<?= base_url()?>app/micuenta">Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url() ?>app/logout">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <!--<?php
            //if (!is_null($menus)) :
            //foreach ($menus as $menu) :
            ?>
                    <li>
                        <a href="<?= base_url() ?>control_escolar/<?= $menu->modulo ?>"> <span class="nav-label"><?= $menu->modulo ?></span> </a>
                    </li>
            <?php
            //endforeach;
            //endif;
            ?>-->

            <?php
            $valoridrol = $valor;
            
            if (!is_null($modulos)):
                foreach ($modulos as $val):
                    if ($val->idmodulo == 1):
                        ?>
                        <li>
                            <a href="<?= base_url() ?>analista/solicitud_de_cuentas_aspirantes">Aceptación de aspirantes</a>
                        </li>
                        <?php
                    endif;
                    ?>
                    <?php    
                    if ($val->idmodulo == 2):
                        ?>
                        <li>
                            <a href="<?= base_url() ?>analista/solicitudes_de_cuentas">Solicitudes aceptados</a>
                        </li>
                        <?php
                    endif;
                    ?>
                    <?php
                    if ($val->idmodulo == 3):
                        ?>
                        <li>
                            <a href="<?= base_url() ?>administrador/roles_usuario"><span class="nav-label">Gestión de roles por usuario</span> </a>
                        </li>
                        <?php
                    endif;
                    ?>                
                              
                    <?php
                    if ($val->idmodulo == 4):
                        ?>
                        <li>
                            <a href="<?= base_url() ?>administrador/roles_admin"><span class="nav-label">Gestión de roles por módulo</span> </a>
                        </li>

                        <?php
                    endif;
                    ?>                
                    <?php
                    if ($val->idmodulo == 5):
                        ?>
                        <li>
                            <a href="#"><span class="nav-label">Catálogos</span><span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url() ?>administrador/modalidad">Modalidades</a></li>
                                <li><a href="<?= base_url() ?>administrador/nivel_educativo">Nivel educativo</a></li>
                                <li><a href="<?= base_url() ?>administrador/tipo_evaluacion">Tipo de evaluación</a></li>
                                <li><a href="<?= base_url() ?>administrador/tipo_ingreso">Tipo de ingreso</a></li>
                                <li><a href="<?= base_url() ?>administrador/turno">Turno</a></li>
                                <li><a href="<?= base_url() ?>administrador/tramite_catalogo">Trámite</a></li>
                                <li><a href="<?= base_url() ?>administrador/materia">Materia</a></li>
                                <li><a href="<?= base_url() ?>administrador/periodo">Periodo</a></li>
                            </ul>
                        </li>
                        <?php
                    endif;
                    ?>    
                    <?php
                    if ($val->idmodulo == 6):
                        ?>
                        <li>
                                <a href="#"><span class="nav-label">Control Escolar</span><span class="fa arrow"></span> </a>

                                <ul class="nav nav-second-level">

                                                <!--  <li><a href="<?= base_url() ?>usuario/tramite/registro_plantel">Plantel</a></li>
                                                       <li><a href="<?= base_url() ?>usuario/tramite/registro_plan_estudios">Plan de estudio</a></li>
                                                       <li><a href="<?= base_url() ?>usuario/tramite/registro_mapa_curricular">Mapa curricular</a></li>-->
                                    <li><a href="<?= base_url() ?>analista_servicios/inscripcion">Inscripción</a></li>
<!--                                    <li><a href="<?= base_url() ?>analista_servicios/inscritos">Alumnos Inscritos</a></li>-->

                                    <li><a href="<?= base_url() ?>analista_servicios/calificacion_subir">Calificación</a></li>
<!--                                    <li><a href="<?= base_url() ?>analista_servicios/calificaciones">Calificaciones</a></li>-->
                                    <li><a href="<?= base_url() ?>analista_servicios/gestion_alumnos">Consultar</a></li>
                                    <!--<li><a href="<?= base_url() ?>analista_servicios/gestion_kardex">Gestión kardex</a></li>-->
                                    <li><a href="<?= base_url() ?>analista_servicios/reinscripcion">Reinscripción</a></li>
                                    <li><a href="<?= base_url() ?>analista_servicios/gestion_grupos">Gestión de grupos</a></li>
                                    <li><a href="<?= base_url() ?>analista_servicios/gestion_planes_estudios/pe_anterior">Gestión de planes de estudio anteriores</a></li>
                                    <li><a href="<?= base_url() ?>analista_servicios/gestion_instituciones">Gestión de planes de estudio</a></li>
                              
                                    
                                    
                                   
                                    
                              
                                </ul>


                            </li>
                        <?php
                    endif;
                    ?> 
                    <?php
                    if ($val->idmodulo == 8):
                        ?>
                        <li>
                            <a href="#"><span class="nav-label">Trámites de acuerdo</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url() ?>analista/gestion_institucion/gestion_instituciones">Instituciones</a></li>
                                <li><a href="<?= base_url() ?>analista/gestion_institucion/gestion_planteles">Planteles</a></li>
<!--                                <li><a href="<?= base_url() ?>analista/gestion_institucion/gestion_planes">Planes de estudio</a></li>
                                <li><a href="<?= base_url() ?>analista/gestion_institucion/gestion_mapas">Mapas curriculares</a></li>-->
                            </ul>
                        </li>
                        <?php
                    endif;
                    ?>   
                    <?php
                    if ($val->idmodulo == 9):
                        ?>
                        <li>
                            <a href="#"><span class="nav-label">Nuevo trámite</span><span class="fa arrow"></span> </a>


                            <ul class="nav nav-second-level">
                                
                                    <li><a href="<?= base_url() ?>usuario/tramite/registro_institucion">Solicitud  de cita para incorporación</a></li>

<!--                                    <li><a href="<?= base_url() ?>usuario/tramite/datos_solicitud_institucion">Datos Institución</a></li>
                                    <li><a href="<?= base_url() ?>usuario/tramite/documento_institucion_aspirante">Documentos solicitados</a></li>
                                    <li><a href="<?= base_url() ?>usuario/tramite/registro_plantel">Plantel</a></li>
                                    <li><a href="<?= base_url() ?>usuario/tramite/registro_plan_estudios">Plan de estudio</a></li>
                                    <li><a href="<?= base_url() ?>usuario/tramite/registro_mapa_curricular">Mapa curricular</a></li>
                              -->
            
            <!--
            <li><a href="<?= base_url() ?>usuario/acuerdo_generado/mostrar_acuerdo">Mostrar acuerdo</a></li>-->
                            </ul>


                        </li>   
                        <?php
                    endif;
                    ?>    
                    <?php
                    if ($val->idmodulo == 10):
                       
                            ?>
                            <li>
                                <a href="#"><span class="nav-label">Control Escolar</span><span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li><a href="<?= base_url() ?>usuario/gestion_grupos">Gestión grupos</a></li>
                                    <li><a href="<?= base_url() ?>usuario/gestion_alumnos">Consultar</a></li>
                                    <!--<li><a href="<?= base_url() ?>usuario/gestion_kardex">Gestión kardex</a></li>-->
                                    <li><a href="<?= base_url() ?>usuario/inscripcion">Inscipción</a></li>
                               </ul>
                            </li>

                            <?php
                        
                    endif;
                    ?>   
                    
<!--                    <?php
                    if ($val->idmodulo == 12):
                        if ($valoridrol->rol != 5):
                            ?>      

                            <li><a href="<?= base_url() ?>analista_servicios/historial_inscripcion">Historial de Inscripción</a></li>
                            <?php
                        endif;
                    endif;
                    ?> -->
<!--                    <?php
                    if ($val->idmodulo == 13):
                        if ($valoridrol->rol != 5):
                            ?>      

                            <li><a href="<?= base_url() ?>analista_servicios/inscripcion">Incripción de alumnos</a></li>
                            <?php
                        endif;
                    endif;
                    ?> -->
<!--                    <?php
                    if ($val->idmodulo == 14):
                        if ($valoridrol->rol != 5):
                            ?>      

                            <li><a href="<?= base_url() ?>analista_servicios/calificacion_subir">Carga de calificaciones</a></li>
                            <?php
                        endif;
                    endif;
                    ?> -->
        <?php
        if ($val->idmodulo == 15):
            ?>  
                        <li>
                            <a href="<?= base_url() ?>analista/gestion_acuerdos/gestion"><span class="nav-label">Gestión acuerdos</span></a>
                        </li>
                        <?php
                    endif;
                    ?>        
        <?php
        if ($val->idmodulo == 16):
            ?>  
                        <li>
                                <a href="#"><span class="nav-label">Acuerdos</span><span class="fa arrow"></span> </a>

                                <ul class="nav nav-second-level">

                                <!--  <li><a href="<?= base_url() ?>usuario/tramite/registro_plantel">Plantel</a></li>
                                       <li><a href="<?= base_url() ?>usuario/tramite/registro_plan_estudios">Plan de estudio</a></li>
                                       <li><a href="<?= base_url() ?>usuario/tramite/registro_mapa_curricular">Mapa curricular</a></li>-->
                                    <?php if(!is_null($acuerdos)):
                                        foreach ($acuerdos as $acu):?>
                                        <li><a href="<?= base_url() ?>usuario/acuerdo_generado/mostrar_acuerdo/<?=$acu->idacuerdo?>">Acuerdo <?=$acu->idacuerdo?></a></li>
                                        <?php
                                        endforeach;
                                    endif;
                                    ?>
                                    <!--<li><a href="<?= base_url() ?>usuario/acuerdo_generado/mostrar_acuerdo">Acuerdo</a></li>-->
                                </ul>


                            </li>
                        <?php
                    endif;
                    ?>  

                                    <?php
                                    if ($val->idmodulo == 17):
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>app/eventos"><span class="nav-label">Citas</span> </a>
                                        </li>
                                        <?php
                                    endif;
                                    ?>
                                        
                                             <?php
                    if ($val->idmodulo == 18):
                        ?>
                        <li>
                            <a href="#"><span class="nav-label">Trámite en proceso</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">                                
                                <?php if(!is_null($institucion_solicitud_menu)) : 
                                    foreach($institucion_solicitud_menu as $row) : ?>
                                <li><a href="<?= base_url() ?>usuario/tramite/documento_institucion_aspirante/<?=$row->idinsti?>">Solicitud  <?=$row->idinsti?> </a></li>
                                    <?php 
                                    endforeach;                                    
                                endif; ?>                                        
            <!--
            <li><a href="<?= base_url() ?>usuario/acuerdo_generado/mostrar_acuerdo">Mostrar acuerdo</a></li>-->
                            </ul>


                        </li>   
                        <?php
                    endif;
                    ?>   
                                             <?php
                    if ($val->idmodulo == 19):
                        ?>
                       
                        <li>
                            <a href="<?= base_url()?>administrador/bitacora_admi">BITÁCORA</a>
                        </li>
                        <?php
                    endif;
                    ?>   
                    <?php
                    //ultimo
              
        if ($val->idmodulo == 20):
            ?>  
                                    <li>
                                            <a href="#"><span class="nav-label">Reportes Escolar</span><span class="fa arrow"></span> </a>

                                            <ul class="nav nav-second-level">

                                              <li> <a href="#"><span class="nav-label">inicio de curso</span><span class="fa arrow"></span> </a>
                                                  <ul class="nav nav-third-level">
                                                                  <li><a href="<?= base_url() ?>analista_servicios/reporte_inicio_general">GENERAL</a></li>
                                                                  <li><a href="<?= base_url() ?>analista_servicios/reporte_inicio">DETALLADO</a></li>
                                                     </ul>
                                                 </li>
                                              <li><a href="<?= base_url() ?>analista_servicios/reporte_fin">Fin de Curso</a></li>
                                              <li><a href="<?= base_url() ?>analista_servicios/reporte_autorizacion_examen_profesional">Exámen Profesional</a></li>
                                            </ul>


                                        </li>
                        <?php
                    endif;
                      if ($val->idmodulo == 22):
            ?>
                                <li>
                                            <a href="<?= base_url()?>analista/reportes_incorporacion"><span class="nav-label">Reportes incorporación</a>

                                        </li>
                        <?php
                    endif; 
                    if($val->idmodulo == 23):
?>
                                        
                                        <li>
                                            <a href="#"><span class="nav-label">Equivalencia y revalidación</span><span class="fa arrow"></span> </a>

                                            <ul class="nav nav-second-level">
                                                <li>
                                                    <a href="#"><span class="nav-label">Equivalencia</span><span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        
                                                        <li><a href="<?= base_url() ?>analista_servicios/equivalencia/solicitudes">Solicitudes Equivalencia</a></li>
                                                        <li><a href="<?= base_url() ?>analista_servicios/equivalencia">Registrar solicitud</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#"><span class="nav-label">Revalidación de estudios</span><span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        
                                                        <li><a href="<?= base_url() ?>analista_servicios/revalidacion/solicitudes">Solicitudes Revalidación de estudios</a></li>
                                                        <li><a href="<?= base_url() ?>analista_servicios/revalidacion">Registrar solicitud</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#"><span class="nav-label">Revalidación de estudios extranjero</span><span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        
                                                        <li><a href="<?= base_url() ?>analista_servicios/revalidacion/solicitudes_extranjero">Solicitudes Revalidación de estudios extranjero</a></li>
                                                        <li><a href="<?= base_url() ?>analista_servicios/revalidacion/revalidacion_extranjero">Registrar solicitud</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#"><span class="nav-label">Dictamen técnico</span><span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        
                                                        <li><a href="<?= base_url() ?>analista_servicios/dictamen_tecnico/solicitudes">Solicitudes Dictamen técnico</a></li>
                                                        <li><a href="<?= base_url() ?>analista_servicios/dictamen_tecnico">Registrar solicitud</a></li>
                                                    </ul>
                                                </li>
                                                <!--<li><a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion">Solicitudes</a></li>-->
                                            </ul>


                                        </li>
                                        <?php
                    endif;
                    if($val->idmodulo == 23):
                    ?>
                                <li>
                                            <a href="#"><span class="nav-label">Plantillas de personal</span><span class="fa arrow"></span> </a>

                                            <ul class="nav nav-second-level">
                                                <li>
                                                    <a href="<?=base_url()?>analista_servicios/plantilla_docente/anexob"><span class="nav-label">Subir plantilla Anexo B</span></a>
                                                </li>
                                                <li>
                                                    <a href="<?=base_url()?>analista_servicios/plantilla_docente/anexoc"><span class="nav-label">Plantilla docente Anexo C</span></a>
                                                </li>
                                                <!--<li><a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion">Solicitudes</a></li>-->
                                            </ul>


                                        </li>        
                    <?php                    
                    endif;
                endforeach;
            endif;
            ?>

            <!--Aqui se encontraba la validación anterior de modulos-->            
            


        </ul>
    </div>
</aside>
