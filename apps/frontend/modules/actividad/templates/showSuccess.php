<table class="tabla_show">
  <tbody>  
    <tr>
      <th style="text-align:right; width:30%">Nombre:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getNombreActividad() ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <th style="text-align:right; width:30%">Ponente:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getPonente() ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <? if ($Actividad->getTurno()) {
             $turno = "Mañana";
         } else {
             $turno = "Tarde";
         }
      ?>   
      <th style="text-align:right; width:30%">Turno:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $turno ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
       <? if ($Actividad->getEjecutada()) {
             $ejecutada = "Si";
         } else {
                 $ejecutada = "No";
         }
      ?>       
      <th style="text-align:right; width:30%">Ejecutada:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $ejecutada ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <th style="text-align:right; width:30%">N° participantes maculino:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getCantidadParticipantesM() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>      
    <tr>
      <th style="text-align:right; width:30%">N° participantes femenino:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getCantidadParticipantesF() ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>      
    <tr>
        <? 
        if ($Actividad->getAlcanzoTiempo()) {
             $tiempo = "Si";
         } else {
             $tiempo = "No";
         }
      ?>        
      <th style="text-align:right; width:30%">¿Alcanzó el tiempo?:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $tiempo ?></td>
    </tr>
     <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>      
    <tr>
      <th style="text-align:right; width:30%">Causas de incumplimiento:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getCausasIncumplimiento() ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
        <?
          $Municipio = MunicipioQuery::create()->filterById($Actividad->getIdMunicipio())->findOne();
          if (count($Municipio) > 0) {
              $municipio = $Municipio->getMunicipio();
          } else {
              $municipio = '--';
          }
        ?>
      <th style="text-align:right; width:30%">Municipio:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $municipio ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <? 
        if ($Actividad->getEscuela()) {
             $escuela = "Si";
         } else {
             $escuela = "No";
         }
      ?>          
      <th style="text-align:right; width:30%">Relizado en escuela:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $escuela ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>     
    <tr>
      <? 
        if ($Actividad->getRefugio()) {
             $refugio = "Si";
         } else {
             $refugio = "No";
         }
      ?>         
      <th style="text-align:right; width:30%">Relizado en refugio:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $refugio ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>          
    <tr>
         <?
          $Sala = SalaQuery::create()->filterById($Actividad->getIdSala())->findOne();
          if (count($Sala) > 0) {
              $sala = $Sala->getNombreSala();
          } else {
              $sala = '--';
          }
        ?>       
      <th style="text-align:right; width:30%">Sala:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $sala ?></td>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>         
    <tr>
      <?php
        list($fecha, $hora) = explode(" ", $Actividad->getFechaHora());
        list($anio,$mes,$dia) = explode("-",$fecha);
        $anio = substr($anio,-2);
        $formato_fecha= $dia . "-" . $mes . "-" . $anio; 
      ?>  
      <th style="text-align:right; width:30%">Fecha:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $formato_fecha ?></td>
    </tr>
    <tr>
      <th style="text-align:right; width:30%">Observaciones:</th>
      <td style="padding-left: 10px; text-align: justify"><?php echo $Actividad->getObservaciones() ?></td>
    </tr>
      <tr>
      <th style="text-align:right; width:30%; line-height: 6px">&nbsp;</th>
      <td style="padding-left: 10px; line-height: 6px">&nbsp;</td>
    </tr>   
  </tbody>
</table>
<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'actividad/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'actividad/edit?id='.$Actividad->getId(),array('title' => 'Editar'))?>
</p>
