<h1>Visitantes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Fecha</th>
      <th>Numero</th>
      <th>Id feria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Visitantes as $Visitante): ?>
    <tr>
      <td><a href="<?php echo url_for('visitante/show?id='.$Visitante->getId()) ?>"><?php echo $Visitante->getId() ?></a></td>
      <td><?php echo $Visitante->getFecha() ?></td>
      <td><?php echo $Visitante->getNumero() ?></td>
      <td><?php echo $Visitante->getIdFeria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('visitante/new') ?>">New</a>
