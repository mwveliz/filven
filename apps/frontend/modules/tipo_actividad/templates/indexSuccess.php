<h1>Tipos de Acctividad</h1>
  <a href="<?php echo url_for('tipo_actividad/new') ?>">Agregar</a>
<table class="tabla_usuario">
  <thead>
    <tr>
      
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Ver</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TipoActividads as $TipoActividad): ?>
    <tr>
      
      <td><?php echo $TipoActividad->getNombreTipo() ?></td>
      <td><?php echo $TipoActividad->getDescripcionTipo() ?></td>
      <td><a href="<?php echo url_for('tipo_actividad/show?id='.$TipoActividad->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('tipo_actividad/edit?id='.$TipoActividad->getId()) ?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


