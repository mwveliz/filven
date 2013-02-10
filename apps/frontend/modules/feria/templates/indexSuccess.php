<h1>Ferias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ferias as $Feria): ?>
    <tr>
      <td><a href="<?php echo url_for('feria/show?id='.$Feria->getId()) ?>"><?php echo $Feria->getId() ?></a></td>
      <td><?php echo $Feria->getDescripcion() ?></td>
      <td><?php echo $Feria->getFechaInicio() ?></td>
      <td><?php echo $Feria->getFechaFin() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('feria/new') ?>">New</a>
