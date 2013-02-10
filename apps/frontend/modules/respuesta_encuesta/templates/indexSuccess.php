<h1>RespuestaEncuestas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Numero encuesta</th>
      <th>Fecha</th>
      <th>Observacion</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Id encuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($RespuestaEncuestas as $RespuestaEncuesta): ?>
    <tr>
      <td><a href="<?php echo url_for('respuesta_encuesta/show?id='.$RespuestaEncuesta->getId()) ?>"><?php echo $RespuestaEncuesta->getId() ?></a></td>
      <td><?php echo $RespuestaEncuesta->getNumeroEncuesta() ?></td>
      <td><?php echo $RespuestaEncuesta->getFecha() ?></td>
      <td><?php echo $RespuestaEncuesta->getObservacion() ?></td>
      <td><?php echo $RespuestaEncuesta->getNombre() ?></td>
      <td><?php echo $RespuestaEncuesta->getApellido() ?></td>
      <td><?php echo $RespuestaEncuesta->getTelefono() ?></td>
      <td><?php echo $RespuestaEncuesta->getEmail() ?></td>
      <td><?php echo $RespuestaEncuesta->getIdEncuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('respuesta_encuesta/new') ?>">New</a>
