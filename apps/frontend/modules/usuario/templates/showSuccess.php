<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Usuario->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Usuario->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $Usuario->getApellido() ?></td>
    </tr>
    <tr>
      <th>Usuario:</th>
      <td><?php echo $Usuario->getUsuario() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $Usuario->getPassword() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $Usuario->getEmail() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $Usuario->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $Usuario->getSexo() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $Usuario->getActivo() ?></td>
    </tr>
    <tr>
      <th>Id sf guard group:</th>
      <td><?php echo $Usuario->getIdSfGuardGroup() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('usuario/edit?id='.$Usuario->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('usuario/index') ?>">List</a>
