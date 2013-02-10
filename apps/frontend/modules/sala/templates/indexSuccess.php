<br>
<center><h1>Salas</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Salas as $Sala): ?>
    <tr>
      <td><center><?php echo $Sala->getNombreSala() ?></center></td>
      <td width="60%"><?php echo $Sala->getDescripcionSala() ?></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'sala/show?id='.$Sala->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'sala/edit?id='.$Sala->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'sala/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>
  
