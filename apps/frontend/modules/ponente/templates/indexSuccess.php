<br>
<center><h1>Ponentes</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Nacionalidad</th>
      <th>Especialidad</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ponentes as $Ponente): ?>
    <tr>
      <td width="35%"><?php echo $Ponente->getNombre() ?></td>
      <td width="20%"><center><?php echo $Ponente->getNacionalidad() ?></center></td>
      <td width="25%"><center><?php echo $Ponente->getEspecialidad() ?></center></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'ponente/show?id='.$Ponente->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'ponente/edit?id='.$Ponente->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'ponente/index?page='.$Ponentes->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'ponente/index?page='.$Ponentes->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Ponentes->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Ponentes->getPage()) ? $page : link_to($page, 'ponente/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Ponentes->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'ponente/index?page='.$Ponentes->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'ponente/index?page='.$Ponentes->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'ponente/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>  

