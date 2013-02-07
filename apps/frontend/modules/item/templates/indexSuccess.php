<h1>Items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Id encuesta</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Items as $Item): ?>
    <tr>
      <td><a href="<?php echo url_for('item/show?id='.$Item->getId()) ?>"><?php echo $Item->getId() ?></a></td>
      <td><?php echo $Item->getTexto() ?></td>
      <td><?php echo $Item->getIdEncuesta() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('item/new') ?>">New</a>
