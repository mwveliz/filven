<h1>Salas</h1>
<a href="<?php echo url_for('sala/new') ?>">Agregar</a>
<table class="tabla_usuario">
  <thead>
    <tr>
      
      <th>Nombre sala</th>
      <th>Descripcion sala</th>
      <th>Ver</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Salas as $Sala): ?>
    <tr>
      
      <td><?php echo $Sala->getNombreSala() ?></td>
      <td><?php echo $Sala->getDescripcionSala() ?></td>
      <td><a href="<?php echo url_for('sala/show?id='.$Sala->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('sala/edit?id='.$Sala->getId()) ?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
