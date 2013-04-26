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
<? if ($caso == 3) { ?>
<table class="tablas">
  <tr>
    <th rowspan="2">Día</th>
    <th width="30%">Número de Actividades Literarias por día</th>
    <th>N° de facilitadores/ Presentadores</th>
    <th>N° total de participantes</th>
  </tr>
  <tr>
  <?
    $total_columna_actividades = 0;;
    $total_columna_facilitadores = 0;
    $total_columna_participantes = 0;
  ?>      
  <? foreach($Actividades as $Actividad) {
        list($anio,$mes,$dia) = explode("-",$Actividad);
        $anio = substr($anio,-2);
        $formato_fecha = $dia . "-" . $mes . "-" . $anio; 
        $NumeroActividades = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->count();
        $NumeroFacilitadores = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_facilitadores_fila = 0;
        foreach ($NumeroFacilitadores as $Facilitadores) {
            $count_facilitadores_fila += $Facilitadores->getFacilitador();
        }
        $NumeroParticipantes = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
        $count_participantes_fila = 0;
        foreach ($NumeroParticipantes as $Participante) {
            $count_participantes_fila += $Participante->getCantidadParticipantesF();
            $count_participantes_fila += $Participante->getCantidadParticipantesM();
        }        
        $total_columna_actividades += $NumeroActividades;
        $total_columna_facilitadores += $count_facilitadores_fila;
        $total_columna_participantes += $count_participantes_fila;
  ?>
  <tr>
      <td>
          <center><? echo $formato_fecha  ?></center>
      </td>
       <td>
          <center><? echo $NumeroActividades  ?></center>
      </td>
       <td>
          <center><? echo $count_facilitadores_fila  ?></center>
      </td>
       <td>
          <center><? echo $count_participantes_fila  ?></center>
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
       <td  rowspan="2" style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_facilitadores  ?></center>
      </td>
       <td rowspan="2" style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_participantes  ?></center>
      </td>     
  </tr>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><b>Total General Participantes</b></center>
      </td>   
  </tr>   
</table>  
<? } ?>
<? if ($caso == 4) { ?>
<table class="tablas">
  <tr>
    <th rowspan="2">Día</th>
    <th width="30%">Número de Actividades Literarias por día</th>
    <th>Número de Poetas participantes</th>
    <th>Recital musical</th>
  </tr>
  <tr>
  <?
    $total_columna_actividades = 0;;
    $total_columna_poetas = 0;
    $total_columna_musicos = 0;
    $total_columna_totales = 0;
  ?>      
  <? foreach($Actividades as $Actividad) {
        list($anio,$mes,$dia) = explode("-",$Actividad);
        $anio = substr($anio,-2);
        $formato_fecha = $dia . "-" . $mes . "-" . $anio; 
        $NumeroActividades = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->count();
        $total_columna_actividades += $NumeroActividades;
        $Acts = ActividadQuery::create()->filterByFecha($Actividad)->where('Actividad.IdSala ='.$id)->find();
      
        $cantidad_musico = 0;
            $cantidad_poeta = 0;
        foreach ($Acts as $Act) {
         
            $PonenteRelActividades = PonenteRelActividadQuery::create()->filterByIdActividad($Act->getId())->find();
            foreach($PonenteRelActividades as $PonenteRelActividad) {
                $Ponente = PonenteQuery::create()->filterById($PonenteRelActividad->getIdPonente())->findOne();
                if (count($Ponente) > 0) {
                    if ($Ponente->getEspecialidad() == 'Músico') {
                        $cantidad_musico++;
                    }
                    if ($Ponente->getEspecialidad() == 'Poeta') {
                        $cantidad_poeta++;
                    }
                }                
            }
                           
        } 
        
        $total_columna_musicos +=  $cantidad_musico;
        $total_columna_poetas +=  $cantidad_poeta;

  ?>
  <tr>
      <td>
          <center><? echo $formato_fecha  ?></center>
      </td>
       <td>
          <center><? echo $NumeroActividades  ?></center>
      </td>
       <td>
          <center><? echo $cantidad_poeta  ?></center>
      </td>
       <td>
          <center><? echo $cantidad_musico  ?></center>
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
          <center><? echo $total_columna_poetas  ?></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;">
          <center><? echo $total_columna_musicos  ?></center>
      </td>     
  </tr>
  <tr>
      <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><b>Total General Participantes</b></center>
      </td>
       <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2">
          <center><? echo $total_columna_poetas + $total_columna_musicos  ?></center>
      </td>    
  </tr>   
</table>  
<? } ?>