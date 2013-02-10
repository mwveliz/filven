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
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'sala/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'sala/edit?id='.$Sala->getId(),array('title' => 'Editar'))?>
</p>

