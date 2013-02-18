<br>
<h1 style="padding-left: 50px;">Feria</h1>
<table class="tabla_show">
  <tbody>
    <tr>
      <th style="text-align:right; width:30%">Descripción:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Feria->getDescripcion() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Feria->getFechaInicio());
        $anio = substr($anio,-2);
        $formato_fecha_inicio= $dia . "-" . $mes . "-" . $anio; 
      ?>          
      <th style="text-align:right; width:30%">Fecha de inicio:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $formato_fecha_inicio ?></td>
    </tr>  
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Feria->getFechaFin());
        $anio = substr($anio,-2);
        $formato_fecha_fin= $dia . "-" . $mes . "-" . $anio; 
      ?>          
      <th style="text-align:right; width:30%">Fecha de cierre:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $formato_fecha_fin?></td>
    </tr>    
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'feria/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'feria/edit?id='.$Feria->getId(),array('title' => 'Editar'))?>
<?php echo link_to(image_tag('delete.png'), 'feria/delete?id='.$Feria->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eleminar?')) ?>    
</p>

