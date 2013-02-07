<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Municipio->getId() ?></td>
    </tr>
    <tr>
      <th>Municipio:</th>
      <td><?php echo $Municipio->getMunicipio() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $Municipio->getEstado() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('municipio/edit?id='.$Municipio->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('municipio/index') ?>">List</a>
