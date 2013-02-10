<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Visitante->getId() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $Visitante->getFecha() ?></td>
    </tr>
    <tr>
      <th>Numero:</th>
      <td><?php echo $Visitante->getNumero() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $Visitante->getIdFeria() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('visitante/edit?id='.$Visitante->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('visitante/index') ?>">List</a>
