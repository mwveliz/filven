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

<center>
<br>
<br>
<?php echo link_to('&laquo;', 'visitante/index?page='.$Visitantes->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'visitante/index?page='.$Visitantes->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Visitantes->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Visitantes->getPage()) ? $page : link_to($page, 'visitante/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Visitantes->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'visitante/index?page='.$Visitantes->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'visitante/index?page='.$Visitantes->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'visitante/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>