<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Acceso->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Acceso->getNombre() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('acceso/edit?id='.$Acceso->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('acceso/index') ?>">List</a>
