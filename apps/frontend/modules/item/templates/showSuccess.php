<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Item->getId() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $Item->getTexto() ?></td>
    </tr>
    <tr>
      <th>Id encuesta:</th>
      <td><?php echo $Item->getIdEncuesta() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('item/edit?id='.$Item->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('item/index') ?>">List</a>
