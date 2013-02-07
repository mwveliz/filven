<h1>OpcionRespuestas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id item</th>
      <th>Respuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($OpcionRespuestas as $OpcionRespuesta): ?>
    <tr>
      <td><a href="<?php echo url_for('opcion_respuesta/show?id='.$OpcionRespuesta->getId()) ?>"><?php echo $OpcionRespuesta->getId() ?></a></td>
      <td><?php echo $OpcionRespuesta->getIdItem() ?></td>
      <td><?php echo $OpcionRespuesta->getRespuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('opcion_respuesta/new') ?>">New</a>
