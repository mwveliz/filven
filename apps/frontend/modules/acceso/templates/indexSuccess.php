<h1>Accesos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Accesos as $Acceso): ?>
    <tr>
      <td><a href="<?php echo url_for('acceso/show?id='.$Acceso->getId()) ?>"><?php echo $Acceso->getId() ?></a></td>
      <td><?php echo $Acceso->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('acceso/new') ?>">New</a>
