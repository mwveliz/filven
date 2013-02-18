<br>
<h1 style="padding-left: 50px;">Informe</h1>
<table class="tabla_show">
  <tbody>
    <tr>
      <th style="text-align:right; width:30%">Título:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Informe->getTituloInforme() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
    <tr>
      <?php
        list($fecha, $hora) = explode(" ", $Informe->getFechaInforme());
        list($anio,$mes,$dia) = explode("-",$fecha);
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>          
      <th style="text-align:right; width:30%">Fecha:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $formato_fecha ?></td>
    </tr>  
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>    
    <tr>
      <th style="text-align:right; width:30%">Creado por:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Informe->getCreadoPor() ?></td>
    </tr>     
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'informe/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'informe/edit?id='.$Informe->getId(),array('title' => 'Editar'))?>
<?php echo link_to(image_tag('delete.png'), 'informe/delete?id='.$Informe->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eleminar?')) ?>   
</p>


