<? 
$id = $sf_params->get('id');
$caso = 1;
$Sala = SalaQuery::create()->filterById($id)->findOne();
if (count($Sala) > 0) {
   $nombre_sala = $Sala->getNombreSala();
   if ($nombre_sala == 'Pabellón Infantil') $caso = 2;
   if ($nombre_sala == 'Pabellón del Cómic') $caso = 3;
   if ($nombre_sala == 'Eje del Buen Vivir') $caso = 4;
}
?>
<br>
<center><h1>Actividades ejecutadas según asistencia diaria  de la sala <? echo $Sala->getNombreSala() ?></h1></center>
<br>
<br>
<br>
<? if ($caso == 1) { ?>
<table class="tablas">
  <tr>
    <th rowspan="2">Día</th>
    <th width="30%">Número de Actividades Literarias por día</th>
    <th>Masculino</th>
    <th>Femenino</th>
  </tr>
  <tr>
  <?
    $total_columna_actividades = 0;;
    $total_columna_hombres = 0;
    $total_columna_mujeres = 0;
    $total_columna_totales = 0;
  ?>      
  <? foreach($Actividades as $Actividad) {
        list($anio,$mes,$dia) = explode("-",$Actividad);
        $anio = substr($anio,-2);
        $formato_fecha = $dia . "-" . $mes . "-" . $anio; 
        $NumeroActividades = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->count();
        $total_hombre_mujer = 0;
        $NumeroHombres = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_hombre_fila = 0;
        foreach ($NumeroHombres as $Hombre) {
            $count_hombre_fila += $Hombre->getCantidadParticipantesM();
        }
        $NumeroMujeres = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_mujer_fila = 0;
        foreach ($NumeroMujeres as $Mujer) {
            $count_mujer_fila += $Mujer->getCantidadParticipantesF();
        }
        $total_columna_actividades += $NumeroActividades;
        $total_columna_hombres += $count_hombre_fila;
        $total_columna_mujeres += $count_mujer_fila;
        $total_hombre_mujer = $count_hombre_fila + $count_mujer_fila;
        $total_columna_totales += $total_hombre_mujer;
  ?>
  <tr>
      <td>
          <center><? echo $formato_fecha  ?></center>
      </td>
       <td>
          <center><? echo $NumeroActividades  ?></center>
      </td>
       <td>
          <center><? echo $count_hombre_fila  ?></center>
      </td>
       <td>
          <center><? echo $count_mujer_fila  ?></center>
      </td>     
  </tr>
<?  } ?>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><b>Totales</b></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_actividades  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_hombres  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_mujeres  ?></center>
      </td>     
  </tr>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><b>Total General Participantes</b></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><? echo $total_columna_totales  ?></center>
      </td>    
  </tr>   
</table>  
<? } ?>
<? if ($caso == 2) { ?>
<table class="tablas">
  <tr>
    <th colspan="2">Día</th>
    <th width="15%">Niños</th>
    <th width="15%">Niñas</th>
    <th>N° de actividades por día</th>
    <th>N° de escuelas atendidas</th>
    <th>N° de refugios atendidos</th>
  </tr>
  <tr>
  <?
    $total_columna_actividades = 0;;
    $total_columna_hombres = 0;
    $total_columna_mujeres = 0;
    $total_columna_totales = 0;
    $total_columna_escuela = 0;
    $total_columna_refugio = 0;    
  ?>      
  <? foreach($Actividades as $Actividad) {
        list($anio,$mes,$dia) = explode("-",$Actividad);
        $anio = substr($anio,-2);
        $formato_fecha = $dia . "-" . $mes . "-" . $anio; 
        $NumeroActividades = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->count();
        $total_hombre_mujer = 0;
        $NumeroHombres = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_hombre_fila = 0;
        foreach ($NumeroHombres as $Hombre) {
            $count_hombre_fila += $Hombre->getCantidadParticipantesM();
        }
        $NumeroMujeres = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_mujer_fila = 0;
        foreach ($NumeroMujeres as $Mujer) {
            $count_mujer_fila += $Mujer->getCantidadParticipantesF();
        }
        $NumeroEscuelas = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_escuela_fila = 0;
        foreach ($NumeroEscuelas as $Escuela) {
            if ($Escuela->getEscuela())  {
                $count_escuela_fila = $count_escuela_fila+1;
            }
        }
        $NumeroRefugios = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_refugio_fila = 0;
        foreach ($NumeroRefugios as $Refugio) {
            if ($Refugio->getRefugio())  {
                $count_refugio_fila = $count_refugio_fila+1;
            }
        }        
        $total_columna_actividades += $NumeroActividades;
        $total_columna_hombres += $count_hombre_fila;
        $total_columna_mujeres += $count_mujer_fila;
        $total_hombre_mujer = $count_hombre_fila + $count_mujer_fila;
        $total_columna_escuela += $count_escuela_fila;
        $total_columna_refugio += $count_refugio_fila;        
        $total_columna_totales += $total_hombre_mujer;
  ?>
  <tr>
      <td colspan="2">
          <center><? echo $formato_fecha  ?></center>
      </td>
       <td >
          <center><? echo $count_hombre_fila  ?></center>
      </td>
       <td >
          <center><? echo $count_mujer_fila  ?></center>
      </td>
       <td>
          <center><? echo $NumeroActividades  ?></center>
      </td>  
       <td>
          <center><? echo $count_escuela_fila  ?></center>
      </td>
       <td>
          <center><? echo $count_refugio_fila  ?></center>
      </td>      
  </tr>
<?  } ?>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><b>Total</b></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_hombres  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_mujeres  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_actividades  ?></center>
      </td>       
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_escuela  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_refugio  ?></center>
      </td>          
  </tr>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><b>Total General Participantes</b></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="5">
          <center><? echo $total_columna_totales  ?></center>
      </td>    
  </tr>   
</table>  
<? } ?>