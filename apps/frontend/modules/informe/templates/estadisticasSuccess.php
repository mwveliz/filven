<?php $id_encuesta = $sf_params->get('id'); ?>
<? // es  visitante
if ($id_encuesta == 18) {
?>
<center><h1>Población encuestada según género </h1></center>
<table class="tablas">
  <tr>
    <th width="30%">Cantidad de Respuestas</th>
    <th width="40%">Género</th>
    <th width="30%">%</th>
  </tr>  
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Sexo%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Masculino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Masculino%')->findOne();
        $Femenino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Femenino%')->findOne();
        if (count($Masculino) > 0 && count($Femenino) > 0) {
            $id_respuesta_masculino = $Masculino->getId();
            $id_respuesta_femenino = $Femenino->getId();
            $CantidadHombres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_masculino )->count();
            $CantidadMujeres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_femenino )->count();
            $Total = $CantidadHombres+$CantidadMujeres;
            $porcentaje_h = round(($CantidadHombres*100)/$Total,2);
            $porcentaje_m = round(($CantidadMujeres*100)/$Total,2);
            
        }
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadHombres ?></center></td>
    <td width="40%"><center>Masculino</center></td>
    <td width="30%"><center><? echo $porcentaje_h.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadMujeres ?></center></td>
    <td width="40%"><center>Femenino</center></td>
    <td width="30%"><center><? echo $porcentaje_m.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table> 
<br>
<br>
<center><h1>Población encuestada según edad</h1></center>
<table class="tablas">
  <tr>
    <th width="30%">Cantidad de Respuestas</th>
    <th width="40%">Grupo Etáreo</th>
    <th width="30%">%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Edad%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Respuestas = RespuestaItemQuery::create()->filterByIdItem($id_item)->find();
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $trece_veinte = 0;
        $veintiuno_cuarenta = 0;
        $cuarentaiuno_sesenta = 0;
        $masdesesenta = 0;
        foreach($Respuestas as $Respuesta) {
            $resultado = $Respuesta->getValor();
            $resultado = intval($resultado);
            if ($resultado <= 20) {
                $trece_veinte = $trece_veinte+1;
            }
            if ($resultado > 20 && $resultado <= 40) {
                $veintiuno_cuarenta = $veintiuno_cuarenta+1;
            }
            if ($resultado > 41 && $resultado <= 60) {
                $cuarentaiuno_sesenta = $cuarentaiuno_sesenta+1;
            } 
            if ($resultado > 60) {
                $masdesesenta = $masdesesenta+1;
            }            
        }
            $porcentaje_trece_veinte = round(($trece_veinte*100)/$Total,2);
            $porcentaje_veintiuno_cuarenta = round(($veintiuno_cuarenta*100)/$Total,2);
            $porcentaje_cuarentaiuno_sesenta = round(($cuarentaiuno_sesenta*100)/$Total,2);
            $porcentaje_masdesesenta = round(($masdesesenta*100)/$Total,2);
       
    }
?>
  <tr>
    <td width="30%"><center><? echo $trece_veinte ?></center></td>
    <td width="40%"><center>Entre 13 y 20 años</center></td>
    <td width="30%"><center><? echo $porcentaje_trece_veinte.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $veintiuno_cuarenta ?></center></td>
    <td width="40%"><center>Entre 21 y 40 años</center></td>
    <td width="30%"><center><? echo $porcentaje_veintiuno_cuarenta.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $cuarentaiuno_sesenta ?></center></td>
    <td width="40%"><center>Entre 41 y 60 años</center></td>
    <td width="30%"><center><? echo $porcentaje_cuarentaiuno_sesenta.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $masdesesenta ?></center></td>
    <td width="40%"><center>Más de 60 años</center></td>
    <td width="30%"><center><? echo $porcentaje_masdesesenta.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total de respuestas</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table> 
<br>
<br>
<center><h1>Población según nivel educativo</h1></center>
<table class="tablas">
  <tr>
    <th width="30%">Cantidad de Respuestas</th>
    <th width="40%">Nivel Educativo</th>
    <th width="30%">%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Nivel educativo actual%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Primaria = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Primaria%')->findOne();
        $Secundaria = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', 'Secundaria')->findOne();
        $Tecnica = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Técnica%')->findOne();
        $Universitario = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Universitario%')->findOne();
        $Postgrado = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Postgrado%')->findOne();
        
        $id_primaria = $Primaria->getId();
        $id_secundaria = $Secundaria->getId();
        $id_tecnica = $Tecnica->getId();
        $id_universitario = $Universitario->getId();
        $id_postgrado = $Postgrado->getId();
        
        $CantidadPrimaria = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_primaria)->count();
        $CantidadSecundaria = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_secundaria)->count();
        $CantidadTecnica = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_tecnica)->count();
        $CantidadUniversitario = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_universitario)->count();
        $CantidadPostgrado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_postgrado)->count();
        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_primaria = round(($CantidadPrimaria*100)/$Total,2);
        $porcentaje_secundaria = round(($CantidadSecundaria*100)/$Total,2);
        $porcentaje_tecnica = round(($CantidadTecnica*100)/$Total,2);
        $porcentaje_universitario = round(($CantidadUniversitario*100)/$Total,2);
        $porcentaje_postgrado = round(($CantidadPostgrado*100)/$Total,2);
        
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadPrimaria ?></center></td>
    <td width="40%"><center>Primaria</center></td>
    <td width="30%"><center><? echo $porcentaje_primaria.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadSecundaria ?></center></td>
    <td width="40%"><center>Secundaria</center></td>
    <td width="30%"><center><? echo $porcentaje_secundaria.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadTecnica ?></center></td>
    <td width="40%"><center>Técnica</center></td>
    <td width="30%"><center><? echo $porcentaje_tecnica.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadUniversitario ?></center></td>
    <td width="40%"><center>Universitaria</center></td>
    <td width="30%"><center><? echo $porcentaje_universitario.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadPostgrado ?></center></td>
    <td width="40%"><center>Postgrado</center></td>
    <td width="30%"><center><? echo $porcentaje_postgrado.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Población que participa en las misiones educativas</h1></center>
<table class="tablas">
  <tr>
    <th width="30%">Cantidad de Respuestas</th>
    <th width="40%">Misión Educativa</th>
    <th width="30%">%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Cursa o estudió estudios en%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Misionrobinson = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Misión Robinson%')->findOne();
        $Misionribas = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Misión Ribas%')->findOne();
        $Misionsucre = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Misión Sucre%')->findOne();
        $Misioncultura = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Misión Cultura%')->findOne();
        $Nohaparticipado = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%No ha participado%')->findOne();
        
        $id_misionrobinson = $Misionrobinson->getId();
        $id_misionribas = $Misionribas->getId();
        $id_misionsucre = $Misionsucre->getId();
        $id_misioncultura = $Misioncultura->getId();
        $id_nohaparticipado = $Nohaparticipado->getId();
        
        $CantidadMisionrobinson = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_misionrobinson)->count();
        $CantidadMisionribas = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_misionribas)->count();
        $CantidadMisionsucre = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_misionsucre)->count();
        $CantidadMisioncultura = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_misioncultura)->count();
        $CantidadNohaparticipado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_nohaparticipado)->count();
        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_misionrobinson = round(($CantidadMisionrobinson*100)/$Total,2);
        $porcentaje_misionribas = round(($CantidadMisionribas*100)/$Total,2);
        $porcentaje_misionsucre = round(($CantidadMisionsucre*100)/$Total,2);
        $porcentaje_misioncultura = round(($CantidadMisioncultura*100)/$Total,2);
        $porcentaje_nohaparticipado = round(($CantidadNohaparticipado*100)/$Total,2);
        
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadMisionrobinson; ?></center></td>
    <td width="40%"><center>Misión Robinson</center></td>
    <td width="30%"><center><? echo $porcentaje_misionrobinson.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadMisionribas ?></center></td>
    <td width="40%"><center>Misión Ribas</center></td>
    <td width="30%"><center><? echo $porcentaje_misionribas.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadMisionsucre ?></center></td>
    <td width="40%"><center>Misión Sucre</center></td>
    <td width="30%"><center><? echo $porcentaje_misionsucre.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadMisioncultura ?></center></td>
    <td width="40%"><center>Misión Cultura</center></td>
    <td width="30%"><center><? echo $porcentaje_misioncultura.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadNohaparticipado ?></center></td>
    <td width="40%"><center>No participó</center></td>
    <td width="30%"><center><? echo $porcentaje_nohaparticipado.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Población según su ocupación</h1></center>
<table class="tablas">
  <tr>
    <th width="30%">Cantidad de Respuestas</th>
    <th width="40%">Ocupación</th>
    <th width="30%">%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Ocupación%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Estudiante = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Estudiante%')->findOne();
        $Trabajador = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', 'Trabajador')->findOne();
        $Jubilado = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Jubilado%')->findOne();
        $Amadecasa = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Ama de casa%')->findOne();
        $Desempleado = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Desempleado%')->findOne();
        $Trabajadorindependiente = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Trabajador independiente%')->findOne();
        $Otro = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Otro%')->findOne();
        
        $id_estudiante = $Estudiante->getId();
        $id_trabajador = $Trabajador->getId();
        $id_jubilado = $Jubilado->getId();
        $id_amadecasa = $Amadecasa->getId();
        $id_desempleado = $Desempleado->getId();
        $id_trabajadorindependiente = $Trabajadorindependiente->getId();
        $id_otro = $Otro->getId();
        
        $CantidadEstudiante = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_estudiante)->count();
        $CantidadTrabajador = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_trabajador)->count();
        $CantidadJubilado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_jubilado)->count();
        $CantidadAmadecasa = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_amadecasa)->count();
        $CantidadDesempleado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_desempleado)->count();
        $CantidadTrabajadorindependiente = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_trabajadorindependiente)->count();
        $CantidadOtro = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_otro)->count();        
        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_estudiante = round(($CantidadEstudiante*100)/$Total,2);
        $porcentaje_trabajador = round(($CantidadTrabajador*100)/$Total,2);
        $porcentaje_jubilado = round(($CantidadJubilado*100)/$Total,2);
        $porcentaje_amadecasa = round(($CantidadAmadecasa*100)/$Total,2);
        $porcentaje_desempleado = round(($CantidadDesempleado*100)/$Total,2);
        $porcentaje_trabajadorindependiente = round(($CantidadTrabajadorindependiente*100)/$Total,2);
        $porcentaje_otro = round(($CantidadOtro*100)/$Total,2);        
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadEstudiante; ?></center></td>
    <td width="40%"><center>Estudiante</center></td>
    <td width="30%"><center><? echo $porcentaje_estudiante.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadTrabajador ?></center></td>
    <td width="40%"><center>Trabajador</center></td>
    <td width="30%"><center><? echo $porcentaje_trabajador.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadJubilado ?></center></td>
    <td width="40%"><center>Jubilado</center></td>
    <td width="30%"><center><? echo $porcentaje_jubilado.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadAmadecasa ?></center></td>
    <td width="40%"><center>Ama de casa</center></td>
    <td width="30%"><center><? echo $porcentaje_amadecasa.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadDesempleado ?></center></td>
    <td width="40%"><center>Desempleado</center></td>
    <td width="30%"><center><? echo $porcentaje_desempleado.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadTrabajadorindependiente ?></center></td>
    <td width="40%"><center>Trabajador independiente</center></td>
    <td width="30%"><center><? echo $porcentaje_trabajadorindependiente.'%'?></center></td>
  </tr> 
    <tr>
    <td width="30%"><center><? echo $CantidadOtro ?></center></td>
    <td width="40%"><center>Otros</center></td>
    <td width="30%"><center><? echo $porcentaje_otro.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Ocupaciones según su género</h1></center>
<table class="tablas">
  <tr>
    <th>Género</th>
    <th>Estudiante</th>
    <th>Trabajador</th>
    <th>Jubilado</th>
    <th>Ama de casa</th>
    <th>Desempleado</th>
    <th>Trabajador independiente</th>
    <th>Otros</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Sexo%')->findOne();
    $ItemOcupacion = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Ocupación%')->findOne();
    
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $id_item_ocupacion = $ItemOcupacion->getId();
        $Masculino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Masculino%')->findOne();
        $Femenino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Femenino%')->findOne();
        if (count($Masculino) > 0 && count($Femenino) > 0) {
            
                $Estudiante = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Estudiante%')->findOne();
                $Trabajador = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', 'Trabajador')->findOne();
                $Jubilado = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Jubilado%')->findOne();
                $Amadecasa = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Ama de casa%')->findOne();
                $Desempleado = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Desempleado%')->findOne();
                $Trabajadorindependiente = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Trabajador independiente%')->findOne();
                $Otro = OpcionRespuestaQuery::create()->filterByIdItem($id_item_ocupacion)->where('OpcionRespuesta.Opcion like ?', '%Otro%')->findOne();

                $id_estudiante = $Estudiante->getId();
                $id_trabajador = $Trabajador->getId();
                $id_jubilado = $Jubilado->getId();
                $id_amadecasa = $Amadecasa->getId();
                $id_desempleado = $Desempleado->getId();
                $id_trabajadorindependiente = $Trabajadorindependiente->getId();
                $id_otro = $Otro->getId();  
                
                $id_respuesta_masculino = $Masculino->getId();
                $id_respuesta_femenino = $Femenino->getId();
                $Hombres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_masculino )->find();
                $CantidadEstudianteH = 0; 
                $CantidadTrabajadorH = 0; 
                $CantidadJubiladoH = 0; 
                $CantidadAmadecasaH = 0; 
                $CantidadDesempleadoH = 0; 
                $CantidadTrabajadorindependienteH = 0; 
                $CantidadOtroH = 0;   
                
                foreach ($Hombres as $Hombre) {

                    $id_encuesta_h = $Hombre->getIdRespuestaEncuesta();
                    
                    $CantidadEstudianteH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_estudiante)->count();
                    $CantidadTrabajadorH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_trabajador)->count();
                    $CantidadJubiladoH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_jubilado)->count();
                    $CantidadAmadecasaH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_amadecasa)->count();
                    $CantidadDesempleadoH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_desempleado)->count();
                    $CantidadTrabajadorindependienteH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_trabajadorindependiente)->count();
                    $CantidadOtroH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_otro)->count();        

            }
                $Mujeres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_femenino )->find();
                $CantidadEstudianteM = 0; 
                $CantidadTrabajadorM = 0; 
                $CantidadJubiladoM = 0; 
                $CantidadAmadecasaM = 0; 
                $CantidadDesempleadoM = 0; 
                $CantidadTrabajadorindependienteM = 0; 
                $CantidadOtroM = 0;   
                
                foreach ($Mujeres as $Mujer) {

                    $id_encuesta_m = $Mujer->getIdRespuestaEncuesta();
                    $CantidadEstudianteM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_estudiante)->count();
                    $CantidadTrabajadorM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_trabajador)->count();
                    $CantidadJubiladoM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_jubilado)->count();
                    $CantidadAmadecasaM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_amadecasa)->count();
                    $CantidadDesempleadoM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_desempleado)->count();
                    $CantidadTrabajadorindependienteM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_trabajadorindependiente)->count();
                    $CantidadOtroM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_otro)->count();        

            }
            
            $TotalH = count($Hombres);
            $porcentaje_estudiante_h = round(($CantidadEstudianteH*100)/$TotalH,2);
            $porcentaje_trabajador_h = round(($CantidadTrabajadorH*100)/$TotalH,2);
            $porcentaje_jubilado_h = round(($CantidadJubiladoH*100)/$TotalH,2);
            $porcentaje_amadecasa_h = round(($CantidadAmadecasaH*100)/$TotalH,2);
            $porcentaje_desempleado_h = round(($CantidadDesempleadoH*100)/$TotalH,2);
            $porcentaje_trabajadorindependiente_h = round(($CantidadTrabajadorindependienteH*100)/$TotalH,2);
            $porcentaje_otro_h = round(($CantidadOtroH*100)/$TotalH,2);
 
            $TotalM = count($Mujeres);
            $porcentaje_estudiante_m = round(($CantidadEstudianteM*100)/$TotalM,2);
            $porcentaje_trabajador_m = round(($CantidadTrabajadorM*100)/$TotalM,2);
            $porcentaje_jubilado_m = round(($CantidadJubiladoM*100)/$TotalM,2);
            $porcentaje_amadecasa_m = round(($CantidadAmadecasaM*100)/$TotalM,2);
            $porcentaje_desempleado_m = round(($CantidadDesempleadoM*100)/$TotalM,2);
            $porcentaje_trabajadorindependiente_m = round(($CantidadTrabajadorindependienteM*100)/$TotalM,2);
            $porcentaje_otro_m = round(($CantidadOtroM*100)/$TotalM,2);            
            
        }
    }
?>
  <tr>
    <td><b><center>Masculino</center><b></td>
    <td><center><? echo $porcentaje_estudiante_h.'%'?></center></td>
    <td><center><? echo $porcentaje_trabajador_h.'%' ?></center></td>
    <td><center><? echo $porcentaje_jubilado_h.'%' ?></center></td>
    <td><center><? echo $porcentaje_amadecasa_h.'%' ?></center></td>
    <td><center><? echo $porcentaje_desempleado_h.'%' ?></center></td>
    <td><center><? echo $porcentaje_trabajadorindependiente_h.'%' ?></center></td>
    <td><center><? echo $porcentaje_otro_h.'%' ?></center></td>
  </tr>
  <tr>
    <td><b><center>Femenino</center><b></td>
    <td><center><? echo $porcentaje_estudiante_m.'%'?></center></td>
    <td><center><? echo $porcentaje_trabajador_m.'%' ?></center></td>
    <td><center><? echo $porcentaje_jubilado_m.'%' ?></center></td>
    <td><center><? echo $porcentaje_amadecasa_m.'%' ?></center></td>
    <td><center><? echo $porcentaje_desempleado_m.'%' ?></center></td>
    <td><center><? echo $porcentaje_trabajadorindependiente_m.'%' ?></center></td>
    <td><center><? echo $porcentaje_otro_m.'%' ?></center></td>
  </tr>  
</table>
<br>
<br>
<center><h1>Procedencia de los visitantes Internacionales (Incompleto)</h1></center>
<table class="tablas">
  <tr>
    <th>País</th>
    <th>Total</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Pais = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%País%')->findOne();
       
    }
?>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<center><h1>Procedencia de los visitantes Nacionales (Incompleto)</h1></center>
<table class="tablas">
  <tr>
    <th>Estados</th>
    <th>Total</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Pais = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%País%')->findOne();
       
    }
?>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<center><h1>Relación según lugar de procedencia (Incompleto)</h1></center>
<table class="tablas">
  <tr>
    <th>Procedencia</th>
    <th>Frecuencia</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Pais = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%País%')->findOne();
       
    }
?>
  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<center><h1>Gusto por la lectura</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Descriptivo</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Le gusta leer?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Si = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Si%')->findOne();
        $No = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%No%')->findOne();
        $id_si = $Si->getId();
        $id_no = $No->getId();
        $CantidadSi = RespuestaItemQuery::create()->filterByIdOpcion($id_si)->count();
        $CantidadNo = RespuestaItemQuery::create()->filterByIdOpcion($id_no)->count();        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_si = round(($CantidadSi*100)/$Total,2);
        $porcentaje_no = round(($CantidadNo*100)/$Total,2);    
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadSi?></center></td>
    <td width="40%"><center>Sí</center></td>
    <td width="30%"><center><? echo $porcentaje_si.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadNo ?></center></td>
    <td width="40%"><center>No</center></td>
    <td width="30%"><center><? echo $porcentaje_no.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Frecuencia  según material de lectura</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Material de lectura</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Qué le gusta leer?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Libro = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Libros%')->findOne();
        $Revista= OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Revistas%')->findOne();
        $Periodico= OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Periódicos%')->findOne();
        $id_libro = $Libro->getId();
        $id_revista = $Revista->getId();
        $id_periodico = $Periodico->getId();
        $CantidadLibro = RespuestaItemQuery::create()->filterByIdOpcion($id_libro)->count();
        $CantidadRevista = RespuestaItemQuery::create()->filterByIdOpcion($id_revista)->count(); 
        $CantidadPeriodico = RespuestaItemQuery::create()->filterByIdOpcion($id_periodico)->count(); 
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_libro = round(($CantidadLibro*100)/$Total,2);
        $porcentaje_revista = round(($CantidadRevista*100)/$Total,2);
        $porcentaje_periodico = round(($CantidadPeriodico*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadLibro?></center></td>
    <td width="40%"><center>Libros</center></td>
    <td width="30%"><center><? echo $porcentaje_libro.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadRevista ?></center></td>
    <td width="40%"><center>Revistas</center></td>
    <td width="30%"><center><? echo $porcentaje_revista.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadPeriodico ?></center></td>
    <td width="40%"><center>Periódicos</center></td>
    <td width="30%"><center><? echo $porcentaje_periodico.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Preferencia  de lectura en soporte físico y digital</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Soporte</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿En qué medio Lee?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $SoporteFisico = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%En soporte físico%')->findOne();
        $SoporteDigital = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%En soporte digital o electrónico%')->findOne();
        $Ambos = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Ambos%')->findOne();
        $id_soportefisico = $SoporteFisico->getId();
        $id_soportedigital = $SoporteDigital->getId();
        $id_ambos = $Ambos->getId();
        $CantidadSoporteFisico = RespuestaItemQuery::create()->filterByIdOpcion($id_soportefisico)->count();
        $CantidadSoporteDigital = RespuestaItemQuery::create()->filterByIdOpcion($id_soportedigital)->count(); 
        $CantidadAmbos = RespuestaItemQuery::create()->filterByIdOpcion($id_ambos)->count(); 
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_soportefisico = round(($CantidadSoporteFisico*100)/$Total,2);
        $porcentaje_soportedigital = round(($CantidadSoporteDigital*100)/$Total,2);
        $porcentaje_ambos = round(($CantidadAmbos*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadSoporteFisico ?></center></td>
    <td width="40%"><center>Soporte físico</center></td>
    <td width="30%"><center><? echo $porcentaje_soportefisico.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadSoporteDigital ?></center></td>
    <td width="40%"><center>Soporte digital o electrónico</center></td>
    <td width="30%"><center><? echo $porcentaje_soportedigital.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadAmbos ?></center></td>
    <td width="40%"><center>Ambos</center></td>
    <td width="30%"><center><? echo $porcentaje_ambos.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Forma de adquisición  de los materiales de lectura</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Adquisición</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Cómo obtiene los libros que lee?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Comprados = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Comprados%')->findOne();
        $Regalados = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Regalados%')->findOne();
        $PrestamosPersonales = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Préstamos Personales%')->findOne();
        $PrestamosBiblioteca = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Préstamos en Biblioteca%')->findOne();
        $Internet = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Internet%')->findOne();
        $id_comprados = $Comprados->getId();
        $id_regalados = $Regalados->getId();
        $id_prestamospersonales = $PrestamosPersonales->getId();
        $id_prestamosbiblioteca = $PrestamosBiblioteca->getId(); 
        $id_internet = $Internet->getId();
        $CantidadComprados = RespuestaItemQuery::create()->filterByIdOpcion($id_comprados)->count();
        $CantidadRegalados = RespuestaItemQuery::create()->filterByIdOpcion($id_regalados)->count(); 
        $CantidadPrestamosPersonales = RespuestaItemQuery::create()->filterByIdOpcion($id_prestamospersonales)->count(); 
        $CantidadPrestamosBiblioteca = RespuestaItemQuery::create()->filterByIdOpcion($id_prestamosbiblioteca)->count();
        $CantidadInternet = RespuestaItemQuery::create()->filterByIdOpcion($id_internet)->count();
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_comprados = round(($CantidadComprados*100)/$Total,2);
        $porcentaje_regalados = round(($CantidadRegalados*100)/$Total,2);
        $porcentaje_prestamospersonales = round(($CantidadPrestamosPersonales*100)/$Total,2);
        $porcentaje_prestamosbiblioteca = round(($CantidadPrestamosBiblioteca*100)/$Total,2);
        $porcentaje_internet = round(($CantidadInternet*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadComprados ?></center></td>
    <td width="40%"><center>Comprados</center></td>
    <td width="30%"><center><? echo $porcentaje_comprados.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadRegalados ?></center></td>
    <td width="40%"><center>Regalados</center></td>
    <td width="30%"><center><? echo $porcentaje_regalados.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadPrestamosPersonales ?></center></td>
    <td width="40%"><center>Prestamos Personales</center></td>
    <td width="30%"><center><? echo $porcentaje_prestamospersonales.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadPrestamosBiblioteca ?></center></td>
    <td width="40%"><center>Prestamos en Bibliotecas</center></td>
    <td width="30%"><center><? echo $porcentaje_prestamosbiblioteca.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadInternet ?></center></td>
    <td width="40%"><center>Internet</center></td>
    <td width="30%"><center><? echo $porcentaje_internet.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Categorización de la lectura de los encuestados</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Finalidad de la Lectura</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Qué es leer para usted?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Divertirse = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Divertirse%')->findOne();
        $Informarse = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Informarse%')->findOne();
        $Mejorartrabajo = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Mejorar en el trabajo%')->findOne();
        $Conocimiento = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Conocimiento%')->findOne();
        $Otro = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Otro%')->findOne();
        $id_divertirse = $Divertirse->getId();
        $id_informarse = $Informarse->getId();
        $id_mejorartrabajo = $Mejorartrabajo->getId();
        $id_conocimiento = $Conocimiento->getId(); 
        $id_otro = $Otro->getId();
        $CantidadDivertirse = RespuestaItemQuery::create()->filterByIdOpcion($id_divertirse)->count();
        $CantidadInformarse = RespuestaItemQuery::create()->filterByIdOpcion($id_informarse)->count(); 
        $CantidadMejorartrabajo = RespuestaItemQuery::create()->filterByIdOpcion($id_mejorartrabajo)->count(); 
        $CantidadConocimiento = RespuestaItemQuery::create()->filterByIdOpcion($id_conocimiento)->count();
        $CantidadOtro = RespuestaItemQuery::create()->filterByIdOpcion($id_otro)->count();
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_divertirse = round(($CantidadDivertirse*100)/$Total,2);
        $porcentaje_informarse = round(($CantidadInformarse*100)/$Total,2);
        $porcentaje_mejorartrabajo = round(($CantidadMejorartrabajo*100)/$Total,2);
        $porcentaje_conocimiento = round(($CantidadConocimiento*100)/$Total,2);
        $porcentaje_otro = round(($CantidadOtro*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadDivertirse ?></center></td>
    <td width="40%"><center>Divertirse</center></td>
    <td width="30%"><center><? echo $porcentaje_divertirse.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadInformarse ?></center></td>
    <td width="40%"><center>Informarse</center></td>
    <td width="30%"><center><? echo $porcentaje_informarse.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadMejorartrabajo ?></center></td>
    <td width="40%"><center>Mejorar en el trabajo</center></td>
    <td width="30%"><center><? echo $porcentaje_mejorartrabajo.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadConocimiento ?></center></td>
    <td width="40%"><center>Conocimiento</center></td>
    <td width="30%"><center><? echo $porcentaje_conocimiento.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadOtro ?></center></td>
    <td width="40%"><center>Otro</center></td>
    <td width="30%"><center><? echo $porcentaje_otro.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Gustos y  preferencia  de los encuestados según géneros literarios (Incompleto)</h1></center>
<table class="tablas">
  <tr>
    <th>Género</th>
    <th>Poesía</th>
    <th>Narrativa</th>
    <th>Ensayo</th>
    <th>Teatro/Dramaturgia</th>
    <th>Biografía/Testimonio</th>
  </tr>
</table>
<br>
<br>
<center><h1>Gustos y  preferencia  de los encuestados según temáticas</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Temática/Géneros</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Cuáles son las temáticas que le han interesado en la feria?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Cuentos = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Cuentos%')->findOne();
        $Novela = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Novela%')->findOne();
        $Historia = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Historia%')->findOne();
        $Cocina = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Cocina%')->findOne();
        $Infantil = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Infantil%')->findOne();
        $Cientifico = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Científico%')->findOne();
        $Autoayuda = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Autoayuda%')->findOne();
        
        $Poesia = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Poesía%')->findOne();
        $Religion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Religión%')->findOne();
        $Politica = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Polítca%')->findOne();
        $Arte = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Arte%')->findOne();
        $Tecnico = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Técnico%')->findOne();
        $TextosEscolares = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Textos Escolares%')->findOne();
        $TextosUniversitarios = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Textos Universitarios%')->findOne();
      
        $id_cuentos = $Cuentos->getId();
        $id_novela = $Novela->getId();
        $id_historia = $Historia->getId();
        $id_cocina = $Cocina->getId(); 
        $id_infantil = $Infantil->getId();
        $id_cientifico = $Cientifico->getId();       
        $id_autoayuda = $Autoayuda->getId();

        $id_poesia = $Poesia->getId();
        $id_religion = $Religion->getId();
        $id_politica = $Politica->getId();
        $id_arte = $Arte->getId(); 
        $id_tecnico = $Tecnico->getId();
        $id_textosescolares = $TextosEscolares->getId();       
        $id_textosuniversitarios = $TextosUniversitarios->getId();
        
        $CantidadCuentos = RespuestaItemQuery::create()->filterByIdOpcion($id_cuentos)->count();
        $CantidadNovela = RespuestaItemQuery::create()->filterByIdOpcion($id_novela)->count(); 
        $CantidadHistoria = RespuestaItemQuery::create()->filterByIdOpcion($id_historia)->count(); 
        $CantidadCocina = RespuestaItemQuery::create()->filterByIdOpcion($id_cocina)->count();
        $CantidadInfantil = RespuestaItemQuery::create()->filterByIdOpcion($id_infantil)->count();
        $CantidadCientifico = RespuestaItemQuery::create()->filterByIdOpcion($id_cientifico)->count();
        $CantidadAutoayuda = RespuestaItemQuery::create()->filterByIdOpcion($id_autoayuda)->count();
        
        $CantidadPoesia = RespuestaItemQuery::create()->filterByIdOpcion($id_poesia)->count();
        $CantidadReligion = RespuestaItemQuery::create()->filterByIdOpcion($id_religion)->count(); 
        $CantidadPolitica = RespuestaItemQuery::create()->filterByIdOpcion($id_politica)->count(); 
        $CantidadArte = RespuestaItemQuery::create()->filterByIdOpcion($id_arte)->count();
        $CantidadTecnico = RespuestaItemQuery::create()->filterByIdOpcion($id_tecnico)->count();
        $CantidadTextosescolares = RespuestaItemQuery::create()->filterByIdOpcion($id_textosescolares)->count();
        $CantidadTextosuniversitarios = RespuestaItemQuery::create()->filterByIdOpcion($id_textosuniversitarios)->count();        
        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_cuentos = round(($CantidadCuentos*100)/$Total,2);
        $porcentaje_novela = round(($CantidadNovela*100)/$Total,2);
        $porcentaje_historia = round(($CantidadHistoria*100)/$Total,2);
        $porcentaje_cocina = round(($CantidadCocina*100)/$Total,2);
        $porcentaje_infantil = round(($CantidadInfantil*100)/$Total,2);
        $porcentaje_cientifico = round(($CantidadCientifico*100)/$Total,2);
        $porcentaje_autoayuda = round(($CantidadAutoayuda*100)/$Total,2);
 
        $porcentaje_poesia = round(($CantidadPoesia*100)/$Total,2);
        $porcentaje_religion = round(($CantidadReligion*100)/$Total,2);
        $porcentaje_politica = round(($CantidadPolitica*100)/$Total,2);
        $porcentaje_arte = round(($CantidadArte*100)/$Total,2);
        $porcentaje_tecnico = round(($CantidadTecnico*100)/$Total,2);
        $porcentaje_textosescolares = round(($CantidadTextosescolares*100)/$Total,2);
        $porcentaje_textosuniversitarios = round(($CantidadTextosuniversitarios*100)/$Total,2);        
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadCuentos ?></center></td>
    <td width="40%"><center>Cuentos</center></td>
    <td width="30%"><center><? echo $porcentaje_cuentos.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadNovela ?></center></td>
    <td width="40%"><center>Novela</center></td>
    <td width="30%"><center><? echo $porcentaje_novela.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadHistoria ?></center></td>
    <td width="40%"><center>Historia</center></td>
    <td width="30%"><center><? echo $porcentaje_historia.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadCocina ?></center></td>
    <td width="40%"><center>Cocina</center></td>
    <td width="30%"><center><? echo $porcentaje_cocina.'%'?></center></td>
  </tr>
   <tr>
    <td width="30%"><center><? echo $CantidadInfantil ?></center></td>
    <td width="40%"><center>Infantil</center></td>
    <td width="30%"><center><? echo $porcentaje_infantil.'%'?></center></td>
  </tr>
   <tr>
    <td width="30%"><center><? echo $CantidadCientifico ?></center></td>
    <td width="40%"><center>Científico</center></td>
    <td width="30%"><center><? echo $porcentaje_cientifico.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadAutoayuda ?></center></td>
    <td width="40%"><center>Autoayuda</center></td>
    <td width="30%"><center><? echo $porcentaje_autoayuda.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadPoesia ?></center></td>
    <td width="40%"><center>Poesía</center></td>
    <td width="30%"><center><? echo $porcentaje_poesia.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadReligion ?></center></td>
    <td width="40%"><center>Religión</center></td>
    <td width="30%"><center><? echo $porcentaje_religion.'%'?></center></td>
  </tr>
  <tr>
    <td width="30%"><center><? echo $CantidadPolitica ?></center></td>
    <td width="40%"><center>Política</center></td>
    <td width="30%"><center><? echo $porcentaje_politica.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadArte ?></center></td>
    <td width="40%"><center>Arte</center></td>
    <td width="30%"><center><? echo $porcentaje_arte.'%'?></center></td>
  </tr>
  <tr>
    <td width="30%"><center><? echo $CantidadTecnico ?></center></td>
    <td width="40%"><center>Técnico</center></td>
    <td width="30%"><center><? echo $porcentaje_tecnico.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadTextosescolares ?></center></td>
    <td width="40%"><center>Textos Escolares</center></td>
    <td width="30%"><center><? echo $porcentaje_textosescolares.'%'?></center></td>
  </tr>
  <tr>
    <td width="30%"><center><? echo $CantidadTextosuniversitarios ?></center></td>
    <td width="40%"><center>Textos Universitarios</center></td>
    <td width="30%"><center><? echo $porcentaje_textosuniversitarios.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>¿Cómo considera la oferta editorial?</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Respuesta</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Cómo considera usted la oferta editorial?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Buena = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Buena%')->findOne();
        $Mala = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Mala%')->findOne();
        $Regular = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Regular%')->findOne();
        $id_buena = $Buena->getId();
        $id_mala = $Mala->getId();
        $id_regular = $Regular->getId();
        $CantidadBuena = RespuestaItemQuery::create()->filterByIdOpcion($id_buena)->count();
        $CantidadMala = RespuestaItemQuery::create()->filterByIdOpcion($id_mala)->count(); 
        $CantidadRegular = RespuestaItemQuery::create()->filterByIdOpcion($id_regular)->count(); 
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_buena = round(($CantidadBuena*100)/$Total,2);
        $porcentaje_mala = round(($CantidadMala*100)/$Total,2);
        $porcentaje_regular = round(($CantidadRegular*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadBuena?></center></td>
    <td width="40%"><center>Buena</center></td>
    <td width="30%"><center><? echo $porcentaje_buena.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadMala ?></center></td>
    <td width="40%"><center>Mala</center></td>
    <td width="30%"><center><? echo $porcentaje_mala.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadRegular ?></center></td>
    <td width="40%"><center>Regular</center></td>
    <td width="30%"><center><? echo $porcentaje_regular.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Valoración de precios</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Valoración de precios</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Con relación a los precios en la actualidad, como considera los de la feria del libro?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Maseconomicos = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Más económicos%')->findOne();
        $Iguales = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Iguales%')->findOne();
        $Maselevados = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Más elevados%')->findOne();
        $id_maseconomico = $Maseconomicos->getId();
        $id_iguales = $Iguales->getId();
        $id_maselevados = $Maselevados->getId();
        $CantidadMaseconomicos = RespuestaItemQuery::create()->filterByIdOpcion($id_maseconomico)->count();
        $CantidadIguales = RespuestaItemQuery::create()->filterByIdOpcion($id_iguales)->count(); 
        $CantidadMaselevados = RespuestaItemQuery::create()->filterByIdOpcion($id_maselevados)->count(); 
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_maseconomicos = round(($CantidadMaseconomicos*100)/$Total,2);
        $porcentaje_iguales = round(($CantidadIguales*100)/$Total,2);
        $porcentaje_maselevados = round(($CantidadMaselevados*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadMaseconomicos ?></center></td>
    <td width="40%"><center>Más económicos</center></td>
    <td width="30%"><center><? echo $porcentaje_maseconomicos.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadIguales ?></center></td>
    <td width="40%"><center>Iguales</center></td>
    <td width="30%"><center><? echo $porcentaje_iguales.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadMaselevados ?></center></td>
    <td width="40%"><center>Más elevados</center></td>
    <td width="30%"><center><? echo $porcentaje_maselevados.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Sistema Masivo de Revistas (No aparece en la encuesta entregada)</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Revistas</th>
    <th>%</th>
  </tr>
</table> 
<br>
<br>
<center><h1>Conocimiento de la Red de Librerías del Sur</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Respuestas</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Conoce usted la red de librerías del Sur?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Si = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Si%')->findOne();
        $No = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%No%')->findOne();
        $id_si = $Si->getId();
        $id_no = $No->getId();
        $CantidadSi = RespuestaItemQuery::create()->filterByIdOpcion($id_si)->count();
        $CantidadNo = RespuestaItemQuery::create()->filterByIdOpcion($id_no)->count();        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_si = round(($CantidadSi*100)/$Total,2);
        $porcentaje_no = round(($CantidadNo*100)/$Total,2);    
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadSi?></center></td>
    <td width="40%"><center>Sí</center></td>
    <td width="30%"><center><? echo $porcentaje_si.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadNo ?></center></td>
    <td width="40%"><center>No</center></td>
    <td width="30%"><center><? echo $porcentaje_no.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>Recomendaría este evento a otras personas</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Descriptivo</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Recomienda este evento a otras personas?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Si = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Si%')->findOne();
        $No = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%No%')->findOne();
        $id_si = $Si->getId();
        $id_no = $No->getId();
        $CantidadSi = RespuestaItemQuery::create()->filterByIdOpcion($id_si)->count();
        $CantidadNo = RespuestaItemQuery::create()->filterByIdOpcion($id_no)->count();        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_si = round(($CantidadSi*100)/$Total,2);
        $porcentaje_no = round(($CantidadNo*100)/$Total,2);    
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadSi?></center></td>
    <td width="40%"><center>Sí</center></td>
    <td width="30%"><center><? echo $porcentaje_si.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadNo ?></center></td>
    <td width="40%"><center>No</center></td>
    <td width="30%"><center><? echo $porcentaje_no.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<center><h1>¿Cómo se enteró usted sobre la feria del libro?</h1></center>
<table class="tablas">
  <tr>
    <th>Cantidad de respuestas</th>
    <th>Descriptivo</th>
    <th>%</th>
  </tr>
<?
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%¿Cómo se enteró usted sobre la feria del libro?%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Radio = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Radio%')->findOne();
        $Prensa = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Prensa%')->findOne();
        $Television = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Televisión%')->findOne();
        $Afiches = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Afiches/Volantes%')->findOne();
        $Recomendacion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Recomendación Personal%')->findOne();
        $Internet = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Internet%')->findOne();
        
        $id_radio = $Radio->getId();
        $id_prensa = $Prensa->getId();
        $id_television = $Television->getId();
        $id_afiches = $Afiches->getId(); 
        $id_recomendacion = $Recomendacion->getId();
        $id_internet = $Internet->getId();        
        
        $CantidadRadio = RespuestaItemQuery::create()->filterByIdOpcion($id_radio)->count();
        $CantidadPrensa = RespuestaItemQuery::create()->filterByIdOpcion($id_prensa)->count(); 
        $CantidadTelevision = RespuestaItemQuery::create()->filterByIdOpcion($id_television)->count(); 
        $CantidadAfiches = RespuestaItemQuery::create()->filterByIdOpcion($id_afiches)->count();
        $CantidadRecomendacion = RespuestaItemQuery::create()->filterByIdOpcion($id_recomendacion)->count();
        $CantidadInternet = RespuestaItemQuery::create()->filterByIdOpcion($id_internet)->count();
        
        $Total = RespuestaItemQuery::create()->filterByIdItem($id_item)->count();
        $porcentaje_radio = round(($CantidadRadio*100)/$Total,2);
        $porcentaje_prensa = round(($CantidadPrensa*100)/$Total,2);
        $porcentaje_television = round(($CantidadTelevision*100)/$Total,2);
        $porcentaje_afiches = round(($CantidadAfiches*100)/$Total,2);
        $porcentaje_recomendacion = round(($CantidadRecomendacion*100)/$Total,2);
        $porcentaje_internet = round(($CantidadInternet*100)/$Total,2);
        
    }
?>
  <tr>
    <td width="30%"><center><? echo $CantidadRadio ?></center></td>
    <td width="40%"><center>Radio</center></td>
    <td width="30%"><center><? echo $porcentaje_radio.'%'?></center></td>
  </tr>  
  <tr>
    <td width="30%"><center><? echo $CantidadPrensa ?></center></td>
    <td width="40%"><center>Prensa</center></td>
    <td width="30%"><center><? echo $porcentaje_prensa.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadTelevision ?></center></td>
    <td width="40%"><center>Televisión</center></td>
    <td width="30%"><center><? echo $porcentaje_television.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadAfiches ?></center></td>
    <td width="40%"><center>Afiches/Volantes</center></td>
    <td width="30%"><center><? echo $porcentaje_afiches.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadRecomendacion ?></center></td>
    <td width="40%"><center>Recomendación personal</center></td>
    <td width="30%"><center><? echo $porcentaje_recomendacion.'%'?></center></td>
  </tr> 
  <tr>
    <td width="30%"><center><? echo $CantidadInternet ?></center></td>
    <td width="40%"><center>Internet</center></td>
    <td width="30%"><center><? echo $porcentaje_internet.'%'?></center></td>
  </tr>   
  <tr>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo $Total ?></b></center></td>
    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b><? echo '100%'?></b></center></td>
  </tr>   
</table>
<br>
<br>
<?
}
?>