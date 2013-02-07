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
