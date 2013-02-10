<h1>RespuestaItems List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id respuesta encuesta</th>
      <th>Valor</th>
      <th>Id item</th>
      <th>Tipo item</th>
      <th>Id opcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($RespuestaItems as $RespuestaItem): ?>
    <tr>
      <td><a href="<?php echo url_for('respuesta_item/show?id='.$RespuestaItem->getId()) ?>"><?php echo $RespuestaItem->getId() ?></a></td>
      <td><?php echo $RespuestaItem->getIdRespuestaEncuesta() ?></td>
      <td><?php echo $RespuestaItem->getValor() ?></td>
      <td><?php echo $RespuestaItem->getIdItem() ?></td>
      <td><?php echo $RespuestaItem->getTipoItem() ?></td>
      <td><?php echo $RespuestaItem->getIdOpcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('respuesta_item/new') ?>">New</a>
