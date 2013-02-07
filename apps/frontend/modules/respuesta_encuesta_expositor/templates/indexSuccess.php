<h1>RespuestaEncuestaExpositors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id item</th>
      <th>Respuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($RespuestaEncuestaExpositors as $RespuestaEncuestaExpositor): ?>
    <tr>
      <td><a href="<?php echo url_for('respuesta_encuesta_expositor/show?id='.$RespuestaEncuestaExpositor->getId()) ?>"><?php echo $RespuestaEncuestaExpositor->getId() ?></a></td>
      <td><?php echo $RespuestaEncuestaExpositor->getIdItem() ?></td>
      <td><?php echo $RespuestaEncuestaExpositor->getRespuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('respuesta_encuesta_expositor/new') ?>">New</a>
