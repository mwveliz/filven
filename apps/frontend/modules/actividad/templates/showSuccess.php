<table class="tabla_usuario">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Actividad->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre actividad:</th>
      <td><?php echo $Actividad->getNombreActividad() ?></td>
    </tr>
    <tr>
      <th>Ponente:</th>
      <td><?php echo $Actividad->getPonente() ?></td>
    </tr>
    <tr>
      <th>Turno:</th>
      <td><?php echo $Actividad->getTurno() ?></td>
    </tr>
    <tr>
      <th>Ejecutada:</th>
      <td><?php echo $Actividad->getEjecutada() ?></td>
    </tr>
    <tr>
      <th>Cantidad participantes m:</th>
      <td><?php echo $Actividad->getCantidadParticipantesM() ?></td>
    </tr>
    <tr>
      <th>Cantidad participantes f:</th>
      <td><?php echo $Actividad->getCantidadParticipantesF() ?></td>
    </tr>
    <tr>
      <th>Alcanzo tiempo:</th>
      <td><?php echo $Actividad->getAlcanzoTiempo() ?></td>
    </tr>
    <tr>
      <th>Causas incumplimiento:</th>
      <td><?php echo $Actividad->getCausasIncumplimiento() ?></td>
    </tr>
    <tr>
      <th>Id municipio:</th>
      <td><?php echo $Actividad->getIdMunicipio() ?></td>
    </tr>
    <tr>
      <th>Escuela:</th>
      <td><?php echo $Actividad->getEscuela() ?></td>
    </tr>
    <tr>
      <th>Refugio:</th>
      <td><?php echo $Actividad->getRefugio() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $Actividad->getObservaciones() ?></td>
    </tr>
    <tr>
      <th>Id sala:</th>
      <td><?php echo $Actividad->getIdSala() ?></td>
    </tr>
    <tr>
      <th>Id tipo actividad:</th>
      <td><?php echo $Actividad->getIdTipoActividad() ?></td>
    </tr>
    <tr>
      <th>Fecha hora:</th>
      <td><?php echo $Actividad->getFechaHora() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('actividad/edit?id='.$Actividad->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('actividad/index') ?>">Listado</a>
