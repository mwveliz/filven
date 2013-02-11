<br>
<center><h1>Encuestas</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Tipo</th>
      <th>Fecha de elaboración</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Encuestas as $Encuesta): ?>
    <tr>
      <td width="25%"><center><?php echo $Encuesta->getNombreEncuesta() ?></center></td>
      <td width="35%"><?php echo $Encuesta->getDescripcionEncuesta() ?></td>
      <td><center><?php echo $Encuesta->getTipoEncuesta() ?></center></td>
      <?php
        list($anio,$mes,$dia) = explode("-",$Encuesta->getFechaElaboracion());
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>
      <td width="15%"><center><?php echo $formato_fecha ?></center></td>
      <td width="20%"><center><?php echo link_to(image_tag('ver.png'),'encuesta/show?id='.$Encuesta->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'encuesta/edit?id='.$Encuesta->getId(),array('title' => 'Editar'))?>
          <?php echo link_to(image_tag('cargar.png'),'respuesta_encuesta/cargarencuestaSuccess/id_encuesta/'.$Encuesta->getId() ,array('title' => 'Cargar respuestas de la encuesta'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'encuesta/index?page='.$Encuestas->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'encuesta/index?page='.$Encuestas->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Encuestas->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Encuestas->getPage()) ? $page : link_to($page, 'encuesta/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Encuestas->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'encuesta/index?page='.$Encuestas->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'encuesta/index?page='.$Encuestas->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'encuesta/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>  

