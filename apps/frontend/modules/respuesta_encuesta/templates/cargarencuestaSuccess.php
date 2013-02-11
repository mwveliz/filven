


<?php foreach ($Items as $Item): ?>


<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $OpcionRespuesta->getId() ?></td>
    </tr>
    <tr>
      <th>Id item:</th>
      <td><?php echo $OpcionRespuesta->getIdItem() ?></td>
    </tr>
    <tr>
      <th>Opcion:</th>
      <td><?php echo $OpcionRespuesta->getOpcion() ?></td>
    </tr>
  </tbody>
</table>


<hr />

<?php endforeach;?>

<a href="<?php echo url_for('opcion_respuesta/edit?id='.$OpcionRespuesta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('opcion_respuesta/index') ?>">List</a>
