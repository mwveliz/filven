<h1>Encuestas</h1>
  <a href="<?php echo url_for('encuesta/new') ?>">Agregar Encuesta</a>

<table>
  <thead>
    <tr>
      
      <th>Nombre de la encuesta</th>
      <th>Descripcion</th>
      <th>Tipo de encuesta</th>
      <th>Fecha de elaboracion</th>
      <th>Editar</th>
      <th>Cargar Datos</th>
      <th>Ver</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Encuestas as $Encuesta): ?>
    <tr>
      
      <td><?php echo $Encuesta->getNombreEncuesta() ?></td>
      <td><?php echo $Encuesta->getDescripcionEncuesta() ?></td>
      <td><?php echo $Encuesta->getTipoEncuesta() ?></td>
      <td><?php echo $Encuesta->getFechaElaboracion() ?></td>
      <td><a href="<?php echo url_for('encuesta/edit?id='.$Encuesta->getId()) ?>">Editar</a></td>;
      <td><a href="<?php echo url_for('encuesta/show?id='.$Encuesta->getId()) ?>">Ver</a></td>;
      <td><a href="<?php echo url_for('respuesta_encuesta_visitante/new')?>"> Cargar</a></td>;
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

