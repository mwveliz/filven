<h1>Municipios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Municipio</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Municipios as $Municipio): ?>
    <tr>
      <td><a href="<?php echo url_for('municipio/show?id='.$Municipio->getId()) ?>"><?php echo $Municipio->getId() ?></a></td>
      <td><?php echo $Municipio->getMunicipio() ?></td>
      <td><?php echo $Municipio->getEstado() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('municipio/new') ?>">New</a>

  <center>
<br>
<br>
<?php echo link_to('&laquo;', 'municipio/index?page='.$Municipios->getFirstPage(),'class=css_paginador') ?>
  <?php echo link_to('&lt;', 'municipio/index?page='.$Municipios->getPreviousPage(),'class=css_paginador') ?>
  <?php $links = $Municipios->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $Municipios->getPage()) ? $page : link_to($page, 'municipio/index?page='.$page,'class=css_paginador') ?>
    <?php if ($page != $Municipios->getCurrentMaxLink()): ?> - <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'municipio/index?page='.$Municipios->getNextPage(),'class=css_paginador') ?>
  <?php echo link_to('&raquo;', 'municipio/index?page='.$Municipios->getLastPage(),'class=css_paginador') ?>
</center>    
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'municipio/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>