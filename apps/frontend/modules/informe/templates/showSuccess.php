<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Informe->getId() ?></td>
    </tr>
    <tr>
      <th>Titulo informe:</th>
      <td><?php echo $Informe->getTituloInforme() ?></td>
    </tr>
    <tr>
      <th>Fecha informe:</th>
      <td><?php echo $Informe->getFechaInforme() ?></td>
    </tr>
    <tr>
      <th>Creado por:</th>
      <td><?php echo $Informe->getCreadoPor() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('informe/edit?id='.$Informe->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('informe/index') ?>">List</a>
