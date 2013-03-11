<br>
<center><h1>Ferias</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Fecha de inicio</th>
      <th>Fecha de cierre</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ferias as $Feria): ?>
    <tr>
      <td width="60%"><?php echo link_to($Feria->getDescripcion(),'feria/proyeccion?id='.$Feria->getId())?></td>
       <?php
        list($anio,$mes,$dia) = explode("-",$Feria->getFechaInicio());
        $anio = substr($anio,-2);
        $formato_fecha_inicio= $dia . "-" . $mes . "-" . $anio; 
      ?>     
      <td><center><?php echo $formato_fecha_inicio ?></center></td>
       <?php
        list($anio,$mes,$dia) = explode("-",$Feria->getFechaFin());
        $anio = substr($anio,-2);
        $formato_fecha_fin= $dia . "-" . $mes . "-" . $anio; 
      ?>     
      <td><center><?php echo $formato_fecha_fin ?></center></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'feria/show?id='.$Feria->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'feria/edit?id='.$Feria->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'feria/index?page='.$Ferias->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'feria/index?page='.$Ferias->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Ferias->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Ferias->getPage()) ? $page : link_to($page, 'feria/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Ferias->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'feria/index?page='.$Ferias->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'feria/index?page='.$Ferias->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'feria/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>