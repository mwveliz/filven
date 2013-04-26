 <br>
<center><h1>Total por sala</h1></center>
<br>
<table class="tablas">
  <tr>
    <th rowspan="2" colspan="2">Sala</th>
    <th colspan="2">Cantidad de Actividades</th>
    <th colspan="5">Número de participantes</th>
  </tr>
  <tr>
    <td>Planificadas</td>
    <td>Ejecutadas</td>
    <td>Hombres</td>
    <td>Mujeres</td>
    <td>Niños</td>
    <td>Niñas</td>
    <td><b>Total</b></td>
  </tr>
  <?
    $total_columna_planificadas = 0;
    $total_columna_ejecutadas = 0;
    $total_columna_hombres = 0;
    $total_columna_mujeres = 0;
    $total_columna_ninos = 0;
    $total_columna_ninas = 0;
    $total_columna_totales = 0;
  ?>
  <? foreach($Salas as $Sala) { ?>
 <tr>
     <td colspan="2"><?php echo link_to($Sala->getNombreSala(),'sala/totalindividual?id='.$Sala->getId())?></td>
     <? $Planificadas = ActividadQuery::create()->filterByIdSala($Sala->getId())->count(); ?>
     <td><center><? echo $Planificadas ?></center></td>
     <? $Ejecutadas = ActividadQuery::create()->filterByIdSala($Sala->getId())->where('Actividad.Ejecutada = true')->count(); ?>
     <td><center><? echo $Ejecutadas ?></center></td>
     <? $count_nino_fila = 0;
        $count_nina_fila = 0;
        $count_hombre_fila = 0;
        $count_mujer_fila = 0;
        if ($Sala->getNombreSala() == 'Pabellón Infantil') {
        $Ninos = ActividadQuery::create()->filterByIdSala($Sala->getId())->find();
        foreach ($Ninos as $Nino) {
            $count_nino_fila += $Nino->getCantidadParticipantesM();
        }
        $Ninas = ActividadQuery::create()->filterByIdSala($Sala->getId())->find();
        foreach ($Ninas as $Nina) {
            $count_nina_fila += $Nina->getCantidadParticipantesF();
        }     
        $total_fila = $count_nino_fila + $count_nina_fila;     
     ?>
           <td><center>-</center></td>
           <td><center>-</center></td>    
           <td><center><? echo $count_nino_fila ?></center></td>
           <td><center><? echo $count_nina_fila ?></center></td>
           <td><center><? echo $total_fila ?></center></td>
     <?
     } else {
        $Hombres = ActividadQuery::create()->filterByIdSala($Sala->getId())->find();
        foreach ($Hombres as $Hombre) {
            $count_hombre_fila += $Hombre->getCantidadParticipantesM();
        }
        $Mujeres = ActividadQuery::create()->filterByIdSala($Sala->getId())->find();
        foreach ($Mujeres as $Mujer) {
            $count_mujer_fila += $Mujer->getCantidadParticipantesF();
        }     
        $total_fila = $count_hombre_fila + $count_mujer_fila;
     ?>         
           <td><center><? echo $count_hombre_fila ?></center></td>
           <td><center><? echo $count_mujer_fila ?></center></td>
           <td><center>-</center></td>
           <td><center>-</center></td>
           <td><center><? echo $total_fila ?></center></td>
     <?    
     }
    $total_columna_planificadas += $Planificadas;
    $total_columna_ejecutadas += $Ejecutadas;
    $total_columna_hombres += $count_hombre_fila;
    $total_columna_mujeres += $count_mujer_fila;
    $total_columna_ninos += $count_nino_fila;
    $total_columna_ninas += $count_nina_fila;
    $total_columna_totales += $total_fila;     
    ?>
 </tr> 
  <? } ?>
   <tr>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="2"><center>Total de actividades</center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_planificadas ?></center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_ejecutadas ?></center></td>
    <td style="background-color: #ffffff; color:black; border : 1px solid  #979696;" ><center><? echo '-' ?></center></td>
    <td style="background-color: #ffffff; color:black; border : 1px solid  #979696;" ><center><? echo '-' ?></center></td>
    <td style="background-color: #ffffff; color:black; border : 1px solid  #979696;" ><center><? echo '-' ?></center></td>
    <td style="background-color: #ffffff; color:black; border : 1px solid  #979696;" ><center><? echo '-' ?></center></td>
    <td style="background-color: #fffff1; color:black; border : 1px solid  #979696;" ><center><? echo '-' ?></center></td>  
  </tr>
  <tr>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" colspan="4"><center>Total General de Participantes</center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_hombres ?></center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_mujeres ?></center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_ninos ?></center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_ninas ?></center></td>
    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;" ><center><? echo $total_columna_totales ?></center></td>
  </tr>
</table>
<br>
<br>