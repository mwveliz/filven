<br>
<center><h1>Listado de Usuarios</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sfGuardUserProfiles as $sfGuardUserProfile): ?>
    <tr>
      <td><?php echo $sfGuardUserProfile->getFirstName() ?></td>
      <td><?php $sfGuardUserProfile->getLastName() ?></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'sfGuardUserProfile/show?id='.$sfGuardUserProfile->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'sfGuardUserProfile/edit?id='.$sfGuardUserProfile->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<center>
<br>
<br>
<?php echo link_to('&laquo;', 'sfGuardUserProfile/index?page='.$sfGuardUserProfiles->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'sfGuardUserProfile/index?page='.$sfGuardUserProfiles->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $sfGuardUserProfiles->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $sfGuardUserProfiles->getPage()) ? $page : link_to($page, 'sfGuardUserProfile/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $sfGuardUserProfiles->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'sfGuardUserProfile/index?page='.$sfGuardUserProfiles->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'sfGuardUserProfile/index?page='.$sfGuardUserProfiles->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'sfGuardUserProfile/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>


