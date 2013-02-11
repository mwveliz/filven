<br>
<center><h1>Informes</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Título</th>
      <th>Fecha</th>
      <th>Creado por</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Informes as $Informe): ?>
    <tr>
      <td width="60%"><?php echo $Informe->getTituloInforme() ?></td>
       <?php
        list($fecha, $hora) = explode(" ", $Informe->getFechaInforme());
        list($anio,$mes,$dia) = explode("-",$fecha);
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>     
      <td><center><?php echo $formato_fecha ?></center></td>
      <td><center><?php echo $Informe->getCreadoPor() ?></center></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'informe/show?id='.$Informe->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'informe/edit?id='.$Informe->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'informe/index?page='.$Informes ->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'informe/index?page='.$Informes ->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Informes ->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Informes ->getPage()) ? $page : link_to($page, 'informe/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Informes ->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'informe/index?page='.$Informes ->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'informe/index?page='.$Informes ->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'informe/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>