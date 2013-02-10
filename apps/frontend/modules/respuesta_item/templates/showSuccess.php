<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $RespuestaItem->getId() ?></td>
    </tr>
    <tr>
      <th>Id respuesta encuesta:</th>
      <td><?php echo $RespuestaItem->getIdRespuestaEncuesta() ?></td>
    </tr>
    <tr>
      <th>Valor:</th>
      <td><?php echo $RespuestaItem->getValor() ?></td>
    </tr>
    <tr>
      <th>Id item:</th>
      <td><?php echo $RespuestaItem->getIdItem() ?></td>
    </tr>
    <tr>
      <th>Tipo item:</th>
      <td><?php echo $RespuestaItem->getTipoItem() ?></td>
    </tr>
    <tr>
      <th>Id opcion:</th>
      <td><?php echo $RespuestaItem->getIdOpcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('respuesta_item/edit?id='.$RespuestaItem->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('respuesta_item/index') ?>">List</a>
