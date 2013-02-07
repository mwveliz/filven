<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
      <link rel="shortcut icon" href="/favicon.ico"/>
      <title>Observatorio del Libro: FILVEN 2013</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
        
        
<center><nav>
<ul class="sf-menu sf-navbar">
        <li><a href="#" title="Actividad"> Actividad</a>
        <ul>
            <li> <?php echo link_to('Nueva Actividad', 'actividad/new' )?></li>
            <li> <?php echo link_to('Listar Actividad', 'actividad/index' )?></li>
            <li> <?php echo link_to('Tipos de Actividad', 'tipo_actividad/index' )?></li>
        </ul>    
    </li>
       <li><a href="#" title="Salas"> Salas</a>
        <ul>
            <li> <?php echo link_to('Nueva Sala', 'sala/new' )?></li>
            <li> <?php echo link_to('Listar Salas', 'sala/index' )?></li>
        </ul>    
    </li>
    
    
    <li><a href="#" title="Encuestas"> Encuestas</a>
        <ul>
            <li> <?php echo link_to('Nueva Encuesta', 'encuesta/new' )?></li>
            <li> <?php echo link_to('Listar Encuestas', 'encuesta/index' )?></li>
        </ul>   
     </li>
    
    
    
    <li><?php echo link_to('Visitantes', 'respuesta_encuesta_visitante' )?> </li>
    
    
    <li><?php echo link_to('Informe', 'informe' )?> </li>
    
    
    <li><?php echo link_to('Página', 'pagina' )?> </li>

    
    <li> <?php echo link_to('Usuarios', '@usuarios' )?></li>
  
    
</ul>
</nav>
</center>      
  </head>
    
    
  <body>
  <center>  <?php echo $sf_content ?> </center>
  </body>
</html>

<script>
    
$(document).ready(function(){
		$("ul.sf-menu").superfish({
                        pathClass:  'current',
			delay:       1000,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                  
                        
		});
    
</script>