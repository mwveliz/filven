<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ValorOpcion->getId() ?></td>
    </tr>
    <tr>
      <th>Id opcion:</th>
      <td><?php echo $ValorOpcion->getIdOpcion() ?></td>
    </tr>
    <tr>
      <th>Valor:</th>
      <td><?php echo $ValorOpcion->getValor() ?></td>
    </tr>
    <tr>
      <th>Id opcion respuesta:</th>
      <td><?php echo $ValorOpcion->getIdOpcionRespuesta() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('valor_opcion/edit?id='.$ValorOpcion->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('valor_opcion/index') ?>">List</a>
