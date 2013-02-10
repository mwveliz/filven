<br>
<center><h1>Páginas</h1></center>
<br>
<table class="tablas">
  <thead>
    <tr>
      <th>Titulo informe</th>
      <th>Titulo cuadro</th>
      <th>Tipo grafico</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Paginas as $Pagina): ?>
    <tr>
      <td width="40%"><center><?php echo $Pagina->getTituloInforme() ?></center></td>
      <td><?php echo $Pagina->getTituloCuadro() ?></td>
      <td><center><?php echo $Pagina->getTipoGrafico() ?></center></td>
      <td width="15%"><center><?php echo link_to(image_tag('ver.png'),'pagina/show?id='.$Pagina->getId(),array('title' => 'Ver detalle'))?>
          <?php echo link_to(image_tag('edit.png'),'pagina/edit?id='.$Pagina->getId(),array('title' => 'Editar'))?>
          </center>
      </td>
   </tr>
    <?php endforeach; ?>
  </tbody>   
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('add.png'),'pagina/new',array('title' => 'Agregar nuevo'))?>&nbsp;&nbsp;
</p>  