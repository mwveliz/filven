<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Sala->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre sala:</th>
      <td><?php echo $Sala->getNombreSala() ?></td>
    </tr>
    <tr>
      <th>Descripcion sala:</th>
      <td><?php echo $Sala->getDescripcionSala() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sala/edit?id='.$Sala->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sala/index') ?>">List</a>
