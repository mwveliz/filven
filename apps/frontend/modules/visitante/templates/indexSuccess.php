<br>
<center><h1>Visitantes</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Número</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Visitantes as $Visitante): ?>
    <tr>
      <?php
        list($anio,$mes,$dia) = explode("-",$Visitante->getFecha());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>         
      <td><center><?php echo $formato_fecha ?></center></td>
      <td><?php echo $Visitante->getNumero() ?></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'visitante/show?id='.$Visitante->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'visitante/edit?id='.$Visitante->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'visitante/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>