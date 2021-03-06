<br>
<center><h1>Tipos de Actividad</h1></center>
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
    <?php foreach ($TipoActividads as $TipoActividad): ?>
    <tr>
      <td><center><?php echo $TipoActividad->getNombreTipo() ?></center></td>
      <td width="60%"><?php echo $TipoActividad->getDescripcionTipo() ?></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'tipo_actividad/show?id='.$TipoActividad->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'tipo_actividad/edit?id='.$TipoActividad->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'tipo_actividad/index?page='.$TipoActividads->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'tipo_actividad/index?page='.$TipoActividads->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $TipoActividads->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $TipoActividads->getPage()) ? $page : link_to($page, 'tipo_actividad/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $TipoActividads->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'tipo_actividad/index?page='.$TipoActividads->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'tipo_actividad/index?page='.$TipoActividads->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'tipo_actividad/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>