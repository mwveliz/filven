<h1>Usuarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Usuario</th>
      <th>Password</th>
      <th>Email</th>
      <th>Telefono</th>
      <th>Sexo</th>
      <th>Activo</th>
      <th>Id sf guard group</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Usuarios as $Usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/show?id='.$Usuario->getId()) ?>"><?php echo $Usuario->getId() ?></a></td>
      <td><?php echo $Usuario->getNombre() ?></td>
      <td><?php echo $Usuario->getApellido() ?></td>
      <td><?php echo $Usuario->getUsuario() ?></td>
      <td><?php echo $Usuario->getPassword() ?></td>
      <td><?php echo $Usuario->getEmail() ?></td>
      <td><?php echo $Usuario->getTelefono() ?></td>
      <td><?php echo $Usuario->getSexo() ?></td>
      <td><?php echo $Usuario->getActivo() ?></td>
      <td><?php echo $Usuario->getIdSfGuardGroup() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">New</a>
