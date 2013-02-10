<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Feria->getId() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $Feria->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Fecha inicio:</th>
      <td><?php echo $Feria->getFechaInicio() ?></td>
    </tr>
    <tr>
      <th>Fecha fin:</th>
      <td><?php echo $Feria->getFechaFin() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('feria/edit?id='.$Feria->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('feria/index') ?>">List</a>
