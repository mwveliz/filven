<br>
<h1 style="padding-left: 50px;">Visitante</h1>
<table class="tabla_show">
  <tbody>
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Visitante->getFecha());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>          
      <th style="text-align:right; width:30%">Fecha:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Visitante->getFecha() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
      <th style="text-align:right; width:30%">Número:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo number_format($Visitante->getNumero()) ?></td>
    </tr>
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'visitante/index',array('title' => 'Ver'))?>
<?php echo link_to(image_tag('edit.png'),'visitante/edit?id='.$Visitante->getId(),array('title' => 'Editar'))?>
</p>