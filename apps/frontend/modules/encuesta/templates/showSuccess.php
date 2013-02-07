<table class="tabla_usuario">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Encuesta->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre encuesta:</th>
      <td><?php echo $Encuesta->getNombreEncuesta() ?></td>
    </tr>
    <tr>
      <th>Descripcion encuesta:</th>
      <td><?php echo $Encuesta->getDescripcionEncuesta() ?></td>
    </tr>
    <tr>
      <th>Tipo encuesta:</th>
      <td><?php echo $Encuesta->getTipoEncuesta() ?></td>
    </tr>
    <tr>
      <th>Fecha elaboracion:</th>
      <td><?php echo $Encuesta->getFechaElaboracion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('encuesta/edit?id='.$Encuesta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('encuesta/index') ?>">List</a>
