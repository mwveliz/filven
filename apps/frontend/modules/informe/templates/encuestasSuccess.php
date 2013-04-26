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
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'informe/estadisticas?id='.$Encuesta->getId(),array('title' => 'Ver totales'))?>
                     </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'informe/encuestas?page='.$Encuestas->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'informe/encuestas?page='.$Encuestas->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Encuestas->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Encuestas->getPage()) ? $page : link_to($page, 'informe/encuestas?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Encuestas->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'informe/encuestas?page='.$Encuestas->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'informe/encuestas?page='.$Encuestas->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
 
