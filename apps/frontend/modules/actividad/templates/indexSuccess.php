<br>
<center><h1>Actividades</h1></center>
<br>
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
    <?php foreach ($Actividads as $Actividad): ?>
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
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'actividad/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>