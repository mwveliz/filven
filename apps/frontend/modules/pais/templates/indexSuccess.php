<h1>Paiss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Paiss as $Pais): ?>
    <tr>
      <td><a href="<?php echo url_for('pais/show?id='.$Pais->getId()) ?>"><?php echo $Pais->getId() ?></a></td>
      <td><?php echo $Pais->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pais/new') ?>">New</a>
