<br>
<h1 style="padding-left: 50px;">Sala</h1>
<table class="tabla_show">
  <tbody>
    <tr>
      <th style="text-align:right; width:30%">Nombre:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Sala->getNombreSala() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Descripción:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Sala->getDescripcionSala() ?></td>
    </tr>
  </tbody>
</table>
<br>
<br>
<? $Actividades = ActividadQuery::proximasactividadessala($Sala->getId(), date('d-m-Y')); 
   if (count($Actividades) > 0) {
?>
 <h1 style="padding-left: 50px;">Próximas actividades</h1>
    <table class="tablas">
      <thead>
        <tr>
          <th>Actividad</th>
          <th>Fecha</th>
          <th>Sala</th>
          <th>Tipo</th>
          <th>Ponente</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Actividades as $Actividad): ?>
        <tr>
          <td width="35%"><?php echo $Actividad->getNombreActividad() ?></td>  
           <?php
            list($fecha, $hora) = explode(" ", $Actividad->getFechaHora());
            list($anio,$mes,$dia) = explode("-",$fecha);
            $anio = substr($anio,-2);
            $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
          ?>       
          <td width="12%"><center><?php echo $formato_fecha ?></center></td>
             <?
              $Sala = SalaQuery::create()->filterById($Actividad->getIdSala())->findOne();
              if (count($Sala) > 0) {
                  $sala = $Sala->getNombreSala();
              } else {
                  $sala = '--';
              }
            ?>
          <td width="25%"><center><?php echo $sala ?></center></td>
          <td width="15%"><center><?php echo $Actividad->getIdTipoActividad() ?></center></td>
          <td width="15%"><center><?php echo $Actividad->getPonente() ?></center></td>
          <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'actividad/show?id='.$Actividad->getId(),array('title' => 'Ver detalle'))?>
              <?php echo link_to(image_tag('edit.png'),'actividad/edit?id='.$Actividad->getId(),array('title' => 'Editar'))?>
              </center>
          </td>
       </tr>
        <?php endforeach; ?>
      </tbody>   
    </table>
 <br>
<?     
   }  
?>

  
     
     

<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'sala/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'sala/edit?id='.$Sala->getId(),array('title' => 'Editar'))?>
</p>

