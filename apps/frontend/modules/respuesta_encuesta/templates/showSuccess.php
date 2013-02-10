<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $RespuestaEncuesta->getId() ?></td>
    </tr>
    <tr>
      <th>Numero encuesta:</th>
      <td><?php echo $RespuestaEncuesta->getNumeroEncuesta() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $RespuestaEncuesta->getFecha() ?></td>
    </tr>
    <tr>
      <th>Observacion:</th>
      <td><?php echo $RespuestaEncuesta->getObservacion() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $RespuestaEncuesta->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $RespuestaEncuesta->getApellido() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $RespuestaEncuesta->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $RespuestaEncuesta->getEmail() ?></td>
    </tr>
    <tr>
      <th>Id encuesta:</th>
      <td><?php echo $RespuestaEncuesta->getIdEncuesta() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('respuesta_encuesta/edit?id='.$RespuestaEncuesta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('respuesta_encuesta/index') ?>">List</a>
