<h1>Paginas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id informe</th>
      <th>Titulo informe</th>
      <th>Ante cuadro</th>
      <th>Titulo cuadro</th>
      <th>Post cuadro</th>
      <th>Texto posterior</th>
      <th>Ante grafico</th>
      <th>Post grafico</th>
      <th>Tipo grafico</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Paginas as $Pagina): ?>
    <tr>
      <td><a href="<?php echo url_for('pagina/show?id='.$Pagina->getId()) ?>"><?php echo $Pagina->getId() ?></a></td>
      <td><?php echo $Pagina->getIdInforme() ?></td>
      <td><?php echo $Pagina->getTituloInforme() ?></td>
      <td><?php echo $Pagina->getAnteCuadro() ?></td>
      <td><?php echo $Pagina->getTituloCuadro() ?></td>
      <td><?php echo $Pagina->getPostCuadro() ?></td>
      <td><?php echo $Pagina->getTextoPosterior() ?></td>
      <td><?php echo $Pagina->getAnteGrafico() ?></td>
      <td><?php echo $Pagina->getPostGrafico() ?></td>
      <td><?php echo $Pagina->getTipoGrafico() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pagina/new') ?>">New</a>
