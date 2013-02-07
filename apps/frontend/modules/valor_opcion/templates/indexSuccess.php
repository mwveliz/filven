<h1>ValorOpcions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id opcion</th>
      <th>Valor</th>
      <th>Id opcion respuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ValorOpcions as $ValorOpcion): ?>
    <tr>
      <td><a href="<?php echo url_for('valor_opcion/show?id='.$ValorOpcion->getId()) ?>"><?php echo $ValorOpcion->getId() ?></a></td>
      <td><?php echo $ValorOpcion->getIdOpcion() ?></td>
      <td><?php echo $ValorOpcion->getValor() ?></td>
      <td><?php echo $ValorOpcion->getIdOpcionRespuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('valor_opcion/new') ?>">New</a>
