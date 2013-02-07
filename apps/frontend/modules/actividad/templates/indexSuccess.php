<h1>Listado de Actividades</h1>
<a href="<?php echo url_for('actividad/new') ?>">Agregar</a>
<table>
  <thead>
    <tr>
      
      <th>Actividad</th>
      <th>Ponente</th>
      <th>Turno</th>
      <th>Ejecutada</th>
      <th>Nro de participantes masc</th>
      <th>Nro de participantes fem</th>
      <th>Alcanzo el tiempo</th>
      <th>Causas de incumplimiento</th>
      <th>Municipio</th>
      <th>Escuela</th>
      <th>Refugio</th>
      <th>Observaciones</th>
      <th>Sala</th>
      <th>Tipo de actividad</th>
      <th>Fecha</th>
      <th>Ver</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Actividads as $Actividad): ?>
    <tr>
      
      <td><?php echo $Actividad->getNombreActividad() ?></td>
      <td><?php echo $Actividad->getPonente() ?></td>
      <td><?php echo $Actividad->getTurno() ?></td>
      <td><?php echo $Actividad->getEjecutada() ?></td>
      <td><?php echo $Actividad->getCantidadParticipantesM() ?></td>
      <td><?php echo $Actividad->getCantidadParticipantesF() ?></td>
      <td><?php echo $Actividad->getAlcanzoTiempo() ?></td>
      <td><?php echo $Actividad->getCausasIncumplimiento() ?></td>
      <td><?php echo $Actividad->getIdMunicipio() ?></td>
      <td><?php echo $Actividad->getEscuela() ?></td>
      <td><?php echo $Actividad->getRefugio() ?></td>
      <td><?php echo $Actividad->getObservaciones() ?></td>
      <td><?php echo $Actividad->getIdSala() ?></td>
      <td><?php echo $Actividad->getIdTipoActividad() ?></td>
      <td><?php echo $Actividad->getFechaHora() ?></td>
      <td><a href="<?php echo url_for('actividad/show?id='.$Actividad->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('actividad/edit?id='.$Actividad->getId()) ?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
