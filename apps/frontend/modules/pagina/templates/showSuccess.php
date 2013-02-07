<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Pagina->getId() ?></td>
    </tr>
    <tr>
      <th>Id informe:</th>
      <td><?php echo $Pagina->getIdInforme() ?></td>
    </tr>
    <tr>
      <th>Titulo informe:</th>
      <td><?php echo $Pagina->getTituloInforme() ?></td>
    </tr>
    <tr>
      <th>Ante cuadro:</th>
      <td><?php echo $Pagina->getAnteCuadro() ?></td>
    </tr>
    <tr>
      <th>Titulo cuadro:</th>
      <td><?php echo $Pagina->getTituloCuadro() ?></td>
    </tr>
    <tr>
      <th>Post cuadro:</th>
      <td><?php echo $Pagina->getPostCuadro() ?></td>
    </tr>
    <tr>
      <th>Texto posterior:</th>
      <td><?php echo $Pagina->getTextoPosterior() ?></td>
    </tr>
    <tr>
      <th>Ante grafico:</th>
      <td><?php echo $Pagina->getAnteGrafico() ?></td>
    </tr>
    <tr>
      <th>Post grafico:</th>
      <td><?php echo $Pagina->getPostGrafico() ?></td>
    </tr>
    <tr>
      <th>Tipo grafico:</th>
      <td><?php echo $Pagina->getTipoGrafico() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('pagina/edit?id='.$Pagina->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('pagina/index') ?>">List</a>
