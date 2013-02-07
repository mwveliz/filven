<table class="tabla_usuario">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $TipoActividad->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre tipo:</th>
      <td><?php echo $TipoActividad->getNombreTipo() ?></td>
    </tr>
    <tr>
      <th>Descripcion tipo:</th>
      <td><?php echo $TipoActividad->getDescripcionTipo() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tipo_actividad/edit?id='.$TipoActividad->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('tipo_actividad/index') ?>">Listado</a>
