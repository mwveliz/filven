<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Observatorio del Libro: FILVEN 2013</title>
  <meta name="description" content="website description">
  <meta name="keywords" content="website keywords, website keywords">
  <link rel="stylesheet" href="css/style_menu.css" />
  <link rel="stylesheet" type="text/css" href="css/style_layout.css" title="style">
  <link rel="stylesheet" type="text/css" href="css/style_form.css" title="style">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>


</head>
<body>
  <div id="main">
    <div id="header">
      <div id="login_sup">
          &nbsp;
      </div>    
      <div>
        <table width="100%" bgcolor="white" style="padding-top:10px;">
            <tr>
                <td>
                   &nbsp;
                </td>
                <td>
                   <? echo image_tag('logo_cenal.jpg')?> 
                </td>
                <td>
                    &nbsp;
                    <p style="padding-right: 50px; text-align: right;"><b><a id="cerrar_sesion" href="<?php echo url_for('/logout') ?>">Cerrar Sesión</a></p>
                </td>
            </tr>
        </table>
      </div>    
      <div id="login_sup">
          &nbsp;
      </div> 
      <div id="menubar">
            <ul class="nav">
                                <li><span><?php echo link_to('Feria', 'feria/index' )?></span></li>
                                <li><a href="#" title="Ponente">Ponente<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Nuevo Ponente', 'ponente/new' )?></span></li>
                                        <li><span><?php echo link_to('Listar Ponente', 'ponente/index' )?></span></li>
                                    </ul>
                                </li>                                
                                <li><a href="#" title="Actividad">Actividad<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Nueva Actividad', 'actividad/new' )?></span></li>
                                        <li><span><?php echo link_to('Listar Actividad', 'actividad/index' )?></span></li>
                                        <li><span><?php echo link_to('Tipos de Actividad', 'tipo_actividad/index' )?></span></li>
                                        <li><span><?php echo link_to('Totales por Actividad', 'actividad/totalactividad' )?></span></li>
                                    </ul>
                                </li>
                                <li><a href="#" title="Salas">Salas<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Nueva Sala', 'sala/new' )?></span></li>
                                        <li><span><?php echo link_to('Listar Salas', 'sala/index' )?></span></li>
                                        <li><span><?php echo link_to('Totales Generales', 'sala/totalgeneral' )?></span></li>
                                    </ul>
                                </li>
                                <li><a href="#" title="Encuestas">Encuestas<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Nueva Encuesta', 'encuesta/new' )?></span></li>
                                        <li><span><?php echo link_to('Listar Encuestas', 'encuesta/index' )?></span></li>
                                        <li><span><?php echo link_to('Totales de encuesta', 'informe/encuestas' )?></span></li>
                                    </ul>
                                </li>
                                <li><a href="#" title="Visitantes">Visitantes<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Registrar Visitantes', 'visitante/new' )?></span></li>
                                        <li><span><?php echo link_to('Listar Resultados', 'visitante/anual' )?></span></li>
                                    </ul>
                                </li>   
                                <!--
                                <li><a href="#" title="Visitantes">Informe<span class="flecha">&#9660;</span></a>
                                    <ul>
                                        <li><span><?php echo link_to('Informes', 'informe/index' )?></span></li>
                                    </ul>
                                </li>                                 
                                <li><span><?php echo link_to('Página', 'pagina' )?></span></li>
                                -->
                                <li class="last"><span><?php echo link_to('Usuarios', 'usuario/index' )?></span></li>
            </ul>  
      </div>
    </div>
    <div id="site_content">
      <div id="content">
         <?php echo $sf_content ?>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
        &nbsp;
    </div>
  </div>


</body></html>