<br>
<h1 style="padding-left: 50px;">Encuesta</h1>
<table class="tabla_show">
  <tbody>
    <tr>
      <th style="text-align:right; width:30%">Nombre:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Encuesta->getNombreEncuesta() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Descripción:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Encuesta->getDescripcionEncuesta() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Tipo:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Encuesta->getTipoEncuesta() ?></td>
    </tr>  
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Encuesta->getFechaElaboracion());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>          
      <th style="text-align:right; width:30%">Fecha:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $formato_fecha ?></td>
    </tr>      
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'encuesta/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'encuesta/edit?id='.$Encuesta->getId(),array('title' => 'Editar'))?>
</p>


