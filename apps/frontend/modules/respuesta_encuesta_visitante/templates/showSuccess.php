<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $RespuestaEncuestaVisitante->getId() ?></td>
    </tr>
    <tr>
      <th>Id item:</th>
      <td><?php echo $RespuestaEncuestaVisitante->getIdItem() ?></td>
    </tr>
    <tr>
      <th>Respuesta:</th>
      <td><?php echo $RespuestaEncuestaVisitante->getRespuesta() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('respuesta_encuesta_visitante/edit?id='.$RespuestaEncuestaVisitante->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('respuesta_encuesta_visitante/index') ?>">List</a>
