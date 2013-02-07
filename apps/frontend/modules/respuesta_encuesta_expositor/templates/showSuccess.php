<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $RespuestaEncuestaExpositor->getId() ?></td>
    </tr>
    <tr>
      <th>Id item:</th>
      <td><?php echo $RespuestaEncuestaExpositor->getIdItem() ?></td>
    </tr>
    <tr>
      <th>Respuesta:</th>
      <td><?php echo $RespuestaEncuestaExpositor->getRespuesta() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('respuesta_encuesta_expositor/edit?id='.$RespuestaEncuestaExpositor->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('respuesta_encuesta_expositor/index') ?>">List</a>
