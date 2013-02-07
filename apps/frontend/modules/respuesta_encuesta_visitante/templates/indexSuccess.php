<h1>RespuestaEncuestaVisitantes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id item</th>
      <th>Respuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($RespuestaEncuestaVisitantes as $RespuestaEncuestaVisitante): ?>
    <tr>
      <td><a href="<?php echo url_for('respuesta_encuesta_visitante/show?id='.$RespuestaEncuestaVisitante->getId()) ?>"><?php echo $RespuestaEncuestaVisitante->getId() ?></a></td>
      <td><?php echo $RespuestaEncuestaVisitante->getIdItem() ?></td>
      <td><?php echo $RespuestaEncuestaVisitante->getRespuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('respuesta_encuesta_visitante/new') ?>">New</a>
