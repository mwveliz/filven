<br>
<h1 style="padding-left: 50px;">Usuario</h1>
<table class="tabla_show">
  <tbody>  
    <tr>
      <th style="text-align:right; width:30%">Usuario:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Usuario->getUsuario() ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%">Nombre:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Usuario->getNombre() ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%">Apellido:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Usuario->getApellido() ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr> 
    <tr>
      <th style="text-align:right; width:30%">Email:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Usuario->getEmail() ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <th style="text-align:right; width:30%">Teléfono:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Usuario->getTelefono() ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>  
    <tr>
       <? if ($Usuario->getSexo() == 1) {
              $sexo = 'Masculino';
          } else {
              $sexo = 'Femenino';
          }
      ?>    
      <th style="text-align:right; width:30%">Sexo:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $sexo ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>
       <? if ($Usuario->getActivo() == 1) {
              $activo = 'Si';
          } else {
              $activo = 'No';
          }
      ?>     
    <tr>
      <th style="text-align:right; width:30%">Activo:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $activo ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'usuario/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'usuario/edit?id='.$Usuario->getId(),array('title' => 'Editar'))?>
<?php // echo link_to(image_tag('delete.png'), 'usuario/delete?id='.$Usuario->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eliminar?')) ?>
</p>

