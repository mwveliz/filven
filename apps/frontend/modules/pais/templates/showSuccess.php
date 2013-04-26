<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Pais->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Pais->getNombre() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('pais/edit?id='.$Pais->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('pais/index') ?>">List</a>
