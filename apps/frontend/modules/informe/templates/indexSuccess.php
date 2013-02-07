<h1>Informes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo informe</th>
      <th>Fecha informe</th>
      <th>Creado por</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Informes as $Informe): ?>
    <tr>
      <td><a href="<?php echo url_for('informe/show?id='.$Informe->getId()) ?>"><?php echo $Informe->getId() ?></a></td>
      <td><?php echo $Informe->getTituloInforme() ?></td>
      <td><?php echo $Informe->getFechaInforme() ?></td>
      <td><?php echo $Informe->getCreadoPor() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('informe/new') ?>">New</a>
