<?php

class InformeQuery extends BaseInformeQuery {

    
 /******************************************************
  *                                                    *
  *                                                    *
  *                 RESULTADOS                         *
  *           ENCUESTAS DE VISITANTE                   *
  *                                                    *
  *                                                    *   
  ******************************************************/     
    
  static public function poblacionencuestadaporgenero ($id_encuesta){
      
     $html = '<center><h1>Población encuestada según género </h1></center>
                <table class="tablas">
                  <tr>
                    <th width="30%">Cantidad de Respuestas</th>
                    <th width="40%">Género</th>
                    <th width="30%">%</th>
                  </tr> ';
     
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
      
    $html .= '  <tr>
                    <td width="30%"><center>'. $CantidadHombres .'</center></td>
                    <td width="40%"><center>Masculino</center></td>
                    <td width="30%"><center>'. $porcentaje_h.'%</center></td>
                  </tr>  
                  <tr>
                    <td width="30%"><center>'. $CantidadMujeres .'</center></td>
                    <td width="40%"><center>Femenino</center></td>
                    <td width="30%"><center>'. $porcentaje_m.'%</center></td>
                  </tr> 
                  <tr>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total .'</b></center></td>
                    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
                  </tr>   
                </table> 
                <br>
                <br>';  
      
      
      return $html;
        
  }  
  
  static public function poblacionencuestadasegunedad ($id_encuesta){
  
      $html = '<center><h1>Población encuestada según edad</h1></center>
                <table class="tablas">
                  <tr>
                    <th width="30%">Cantidad de Respuestas</th>
                    <th width="40%">Grupo Etáreo</th>
                    <th width="30%">%</th>
                  </tr>';
      
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
  
  
    $html .= '  <tr>
                <td width="30%"><center>'. $trece_veinte .'</center></td>
                <td width="40%"><center>Entre 13 y 20 años</center></td>
                <td width="30%"><center>'. $porcentaje_trece_veinte.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $veintiuno_cuarenta .'</center></td>
                <td width="40%"><center>Entre 21 y 40 años</center></td>
                <td width="30%"><center>'. $porcentaje_veintiuno_cuarenta.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $cuarentaiuno_sesenta .'</center></td>
                <td width="40%"><center>Entre 41 y 60 años</center></td>
                <td width="30%"><center>'. $porcentaje_cuarentaiuno_sesenta.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $masdesesenta .'</center></td>
                <td width="40%"><center>Más de 60 años</center></td>
                <td width="30%"><center>'. $porcentaje_masdesesenta.'%</center></td>
              </tr> 
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total de respuestas</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table> 
            <br>
            <br>';
    
    return $html;
    
  } 
  
  
  static public function poblacionencuestadasegunniveleducativo ($id_encuesta){
     
  $html = '<center><h1>Población según nivel educativo</h1></center>
            <table class="tablas">
              <tr>
                <th width="30%">Cantidad de Respuestas</th>
                <th width="40%">Nivel Educativo</th>
                <th width="30%">%</th>
              </tr>';    
      
  
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadPrimaria .'</center></td>
                <td width="40%"><center>Primaria</center></td>
                <td width="30%"><center>'. $porcentaje_primaria.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadSecundaria .'</center></td>
                <td width="40%"><center>Secundaria</center></td>
                <td width="30%"><center>'. $porcentaje_secundaria.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadTecnica .'</center></td>
                <td width="40%"><center>Técnica</center></td>
                <td width="30%"><center>'. $porcentaje_tecnica.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadUniversitario .'</center></td>
                <td width="40%"><center>Universitaria</center></td>
                <td width="30%"><center>'. $porcentaje_universitario.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadPostgrado .'</center></td>
                <td width="40%"><center>Postgrado</center></td>
                <td width="30%"><center>'. $porcentaje_postgrado.'%</center></td>
              </tr> 
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
    
    
      return $html;
  }
  
  static public function poblacionqueparticipaenlasmisioneseducativas ($id_encuesta) {
      
      $html = '<center><h1>Población que participa en las misiones educativas</h1></center>
                <table class="tablas">
                  <tr>
                    <th width="30%">Cantidad de Respuestas</th>
                    <th width="40%">Misión Educativa</th>
                    <th width="30%">%</th>
                  </tr>';
      
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadMisionrobinson .'</center></td>
                <td width="40%"><center>Misión Robinson</center></td>
                <td width="30%"><center>'. $porcentaje_misionrobinson.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadMisionribas .'</center></td>
                <td width="40%"><center>Misión Ribas</center></td>
                <td width="30%"><center>'. $porcentaje_misionribas.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadMisionsucre .'</center></td>
                <td width="40%"><center>Misión Sucre</center></td>
                <td width="30%"><center>'. $porcentaje_misionsucre.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadMisioncultura .'</center></td>
                <td width="40%"><center>Misión Cultura</center></td>
                <td width="30%"><center>'. $porcentaje_misioncultura.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadNohaparticipado .'</center></td>
                <td width="40%"><center>No participó</center></td>
                <td width="30%"><center>'. $porcentaje_nohaparticipado.'%</center></td>
              </tr> 
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
      
      
      return $html;
  }
  
  static public function poblacionsegunsuocupacion($id_encuesta) {
      
    $html = '<center><h1>Población según su ocupación</h1></center>
                <table class="tablas">
                  <tr>
                    <th width="30%">Cantidad de Respuestas</th>
                    <th width="40%">Ocupación</th>
                    <th width="30%">%</th>
                  </tr>';
      
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
     
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadEstudiante .'</center></td>
                <td width="40%"><center>Estudiante</center></td>
                <td width="30%"><center>'. $porcentaje_estudiante.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadTrabajador .'</center></td>
                <td width="40%"><center>Trabajador</center></td>
                <td width="30%"><center>'. $porcentaje_trabajador.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadJubilado .'</center></td>
                <td width="40%"><center>Jubilado</center></td>
                <td width="30%"><center>'. $porcentaje_jubilado.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadAmadecasa .'</center></td>
                <td width="40%"><center>Ama de casa</center></td>
                <td width="30%"><center>'. $porcentaje_amadecasa.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadDesempleado .'</center></td>
                <td width="40%"><center>Desempleado</center></td>
                <td width="30%"><center>'. $porcentaje_desempleado.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadTrabajadorindependiente .'</center></td>
                <td width="40%"><center>Trabajador independiente</center></td>
                <td width="30%"><center>'. $porcentaje_trabajadorindependiente.'%</center></td>
              </tr> 
                <tr>
                <td width="30%"><center>'. $CantidadOtro .'</center></td>
                <td width="40%"><center>Otros</center></td>
                <td width="30%"><center>'. $porcentaje_otro.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';  
      
    return $html;
    
  }
  
  
  static public function ocupacionessegunsugenero($id_encuesta) {
      
      $html = '<center><h1>Ocupaciones según su género</h1></center>
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
                  </tr>';
      
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
            
            $TotalH = $CantidadEstudianteH+$CantidadTrabajadorH+$CantidadJubiladoH+$CantidadAmadecasaH+$CantidadDesempleadoH+$CantidadTrabajadorindependienteH+$CantidadOtroH;
            $porcentaje_estudiante_h = round(($CantidadEstudianteH*100)/$TotalH,2);
            $porcentaje_trabajador_h = round(($CantidadTrabajadorH*100)/$TotalH,2);
            $porcentaje_jubilado_h = round(($CantidadJubiladoH*100)/$TotalH,2);
            $porcentaje_amadecasa_h = round(($CantidadAmadecasaH*100)/$TotalH,2);
            $porcentaje_desempleado_h = round(($CantidadDesempleadoH*100)/$TotalH,2);
            $porcentaje_trabajadorindependiente_h = round(($CantidadTrabajadorindependienteH*100)/$TotalH,2);
            $porcentaje_otro_h = round(($CantidadOtroH*100)/$TotalH,2);
 
            $TotalM = $CantidadEstudianteM+$CantidadTrabajadorM+$CantidadJubiladoM+$CantidadAmadecasaM+$CantidadDesempleadoM+$CantidadTrabajadorindependienteM+$CantidadOtroM;
            $porcentaje_estudiante_m = round(($CantidadEstudianteM*100)/$TotalM,2);
            $porcentaje_trabajador_m = round(($CantidadTrabajadorM*100)/$TotalM,2);
            $porcentaje_jubilado_m = round(($CantidadJubiladoM*100)/$TotalM,2);
            $porcentaje_amadecasa_m = round(($CantidadAmadecasaM*100)/$TotalM,2);
            $porcentaje_desempleado_m = round(($CantidadDesempleadoM*100)/$TotalM,2);
            $porcentaje_trabajadorindependiente_m = round(($CantidadTrabajadorindependienteM*100)/$TotalM,2);
            $porcentaje_otro_m = round(($CantidadOtroM*100)/$TotalM,2);            
            
        }
    }
    
    
    $html .= '  <tr>
                <td><b><center>Masculino</center><b></td>
                <td><center>'. $porcentaje_estudiante_h.'%</center></td>
                <td><center>'. $porcentaje_trabajador_h.'%</center></td>
                <td><center>'. $porcentaje_jubilado_h.'%</center></td>
                <td><center>'. $porcentaje_amadecasa_h.'%</center></td>
                <td><center>'. $porcentaje_desempleado_h.'%</center></td>
                <td><center>'. $porcentaje_trabajadorindependiente_h.'%</center></td>
                <td><center>'. $porcentaje_otro_h.'%</center></td>
              </tr>
              <tr>
                <td><b><center>Femenino</center><b></td>
                <td><center>'. $porcentaje_estudiante_m.'%</center></td>
                <td><center>'. $porcentaje_trabajador_m.'%</center></td>
                <td><center>'. $porcentaje_jubilado_m.'%</center></td>
                <td><center>'. $porcentaje_amadecasa_m.'%</center></td>
                <td><center>'. $porcentaje_desempleado_m.'%</center></td>
                <td><center>'. $porcentaje_trabajadorindependiente_m.'%</center></td>
                <td><center>'. $porcentaje_otro_m.'%</center></td>
              </tr>  
            </table>
            <br>
            <br>';
    
    return $html;
      
  }
  
  
  static public function procedenciadelosvisitantesinternacionales($id_encuesta) {
      
      $html = '<center><h1>Procedencia de los visitantes Internacionales</h1></center>
                <table class="tablas">
                  <tr>
                    <th>País</th>
                    <th>Total</th>
                    <th>%</th>
                  </tr>';
      
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Paises = PaisQuery::create()->orderByNombre('asc')->find();
        $arreglo_pais = array();
        foreach ($Paises as $Pais) {
            if ($Pais->getNombre() != 'Venezuela') {
               $TotalPais = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.Valor like ?', $Pais->getNombre())->count(); 
               if ($TotalPais > 0) {
                    $arreglo_pais[$Pais->getNombre()] = $TotalPais;
               }
            }
        }
        $total_participacion_extranjera = array_sum($arreglo_pais);
        arsort($arreglo_pais);
        foreach ($arreglo_pais as $key => $val) {
           $html .= '<tr><td><center>'.$key.'</center></td><td><center>'.$val.'</center></td><td><center>'.round(($val*100)/$total_participacion_extranjera,2).'%</center></td>';
        }       
        
    } 
    
    
    $html .= '  <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total Participación Extranjera</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$total_participacion_extranjera.'</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
            </tr>
          </table>
          <br>
          <br>';
    
    return $html;
    
    
  }
  
  static public function procedenciadelosvisitantesnacionales($id_encuesta) {
    
      $html = '<center><h1>Procedencia de los visitantes nacionales</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Estados</th>
                    <th>Total</th>
                  </tr>';
      
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
        $arreglo_estado = array();
        foreach ($Estados as $Estado) {
               $TotalEstado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.Valor like ?', $Estado->getNombre())->count(); 
               if ($TotalEstado > 0) {
                    $arreglo_estado[$Estado->getNombre()] = $TotalEstado;
               }
        }
        $total_participacion_nacional = array_sum($arreglo_estado);
        foreach ($arreglo_estado as $key => $val) {
           $html .= '<tr><td><center>'.$key.'</center></td><td><center>'.$val.'</center></td>';
        }       
        
    } 
    
    
    $html .= '  <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total Visitantes</b></center></td>
                <td width="20%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$total_participacion_nacional.'</b></center></td>
            </tr>
          </table>
          <br>
          <br>';
    
    return $html;

      
  }
  
  
  static public function relacionsegunlugardeprocedencia($id_encuesta) {
      
     $html = '<center><h1>Relación según lugar de procedencia</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Procedencia</th>
                    <th>Frecuencia</th>
                    <th>%</th>
                  </tr>';
      
      
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Paises = PaisQuery::create()->orderByNombre('asc')->find();
        $arreglo_pais = array();
        foreach ($Paises as $Pais) {
            if ($Pais->getNombre() != 'Venezuela') {
               $TotalPais = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.Valor like ?', $Pais->getNombre())->count(); 
               if ($TotalPais > 0) {
                    $arreglo_pais[$Pais->getNombre()] = $TotalPais;
               }
            }
        }
        $total_participacion_extranjera = array_sum($arreglo_pais);
    }
    
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Lugar de procedencia%')->findOne();
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
        $arreglo_estado = array();
        foreach ($Estados as $Estado) {
               $TotalEstado = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.Valor like ?', $Estado->getNombre())->count(); 
               if ($TotalEstado > 0) {
                    $arreglo_estado[$Estado->getNombre()] = $TotalEstado;
               }
        }
        $total_participacion_nacional = array_sum($arreglo_estado);  
    }
    $Total = $total_participacion_nacional + $total_participacion_extranjera;
    $porcentaje_extranjera = round(($total_participacion_extranjera*100)/$Total,2);   
    $porcentaje_nacional = round(($total_participacion_nacional*100)/$Total,2);   
    
    $html .= '  <tr>
                    <td><center>Internacional</center></td><td><center>'.$total_participacion_extranjera.'</center></td><td><center>'.$porcentaje_extranjera.'</center></td>
                </tr>
                <tr>
                    <td><center>Nacional</center></td><td><center>'.$total_participacion_nacional.'</center></td><td><center>'.$porcentaje_nacional.'</center></td>
                </tr>
                <tr>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total de participación</b></center></td>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total.'</b></center></td>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
                </tr>
          </table>
          <br>
          <br>';
    
    return $html;
    
    
  }  
  
  static public function gustoporlalectura($id_encuesta) {
      
     $html = '<center><h1>Gusto por la lectura</h1></center>
            <table class="tablas">
              <tr>
                <th>Cantidad de respuestas</th>
                <th>Descriptivo</th>
                <th>%</th>
              </tr>'; 
     
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
    
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadSi .'</center></td>
                <td width="40%"><center>Sí</center></td>
                <td width="30%"><center>'. $porcentaje_si.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadNo .'</center></td>
                <td width="40%"><center>No</center></td>
                <td width="30%"><center>'. $porcentaje_no.'%</center></td>
              </tr> 
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
      
      return $html;
    
  }
  
   static public function frecuenciasegunmaterialdelectura($id_encuesta) {
       
     $html = '<center><h1>Frecuencia  según material de lectura</h1></center>
         <table class="tablas">
                <tr>
                  <th>Cantidad de respuestas</th>
                  <th>Material de lectura</th>
                  <th>%</th>
                </tr>';
       
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
    
    $html .= '<tr>
            <td width="30%"><center>'. $CantidadLibro .'</center></td>
            <td width="40%"><center>Libros</center></td>
            <td width="30%"><center>'. $porcentaje_libro.'%</center></td>
          </tr>  
          <tr>
            <td width="30%"><center>'. $CantidadRevista .'</center></td>
            <td width="40%"><center>Revistas</center></td>
            <td width="30%"><center>'. $porcentaje_revista.'%</center></td>
          </tr> 
          <tr>
            <td width="30%"><center>'. $CantidadPeriodico .'</center></td>
            <td width="40%"><center>Periódicos</center></td>
            <td width="30%"><center>'. $porcentaje_periodico.'%</center></td>
          </tr>   
          <tr>
            <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
            <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
            <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
          </tr>   
        </table>
        <br>
        <br>';
    
    return $html;
    
       
   }
  
   
   static public function preferenciadelecturaensoportefisicoydigital($id_encuesta) {
       
     $html = '<center><h1>Preferencia  de lectura en soporte físico y digital</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Soporte</th>
                    <th>%</th>
                  </tr>';
       
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
      
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadSoporteFisico .'</center></td>
                <td width="40%"><center>Soporte físico</center></td>
                <td width="30%"><center>'. $porcentaje_soportefisico.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadSoporteDigital .'</center></td>
                <td width="40%"><center>Soporte digital o electrónico</center></td>
                <td width="30%"><center>'. $porcentaje_soportedigital.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadAmbos .'</center></td>
                <td width="40%"><center>Ambos</center></td>
                <td width="30%"><center>'. $porcentaje_ambos.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
       
    
        return $html;
   }
  

   static public function formadeadquisiciondelosmaterialesdelectura($id_encuesta) {
       
     $html = '<center><h1>Forma de adquisición  de los materiales de lectura</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Adquisición</th>
                    <th>%</th>
                  </tr>';
       
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadComprados .'</center></td>
                <td width="40%"><center>Comprados</center></td>
                <td width="30%"><center>'. $porcentaje_comprados.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadRegalados .'</center></td>
                <td width="40%"><center>Regalados</center></td>
                <td width="30%"><center>'. $porcentaje_regalados.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadPrestamosPersonales .'</center></td>
                <td width="40%"><center>Prestamos Personales</center></td>
                <td width="30%"><center>'. $porcentaje_prestamospersonales.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadPrestamosBiblioteca .'</center></td>
                <td width="40%"><center>Prestamos en Bibliotecas</center></td>
                <td width="30%"><center>'. $porcentaje_prestamosbiblioteca.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadInternet .'</center></td>
                <td width="40%"><center>Internet</center></td>
                <td width="30%"><center>'. $porcentaje_internet.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
    
       return $html;
       
   } 
   
   
   static public function categorizaciondelalecturadelosencuestados($id_encuesta) {
       
    $html = '<center><h1>Categorización de la lectura de los encuestados</h1></center>
        <table class="tablas">
                <tr>
                  <th>Cantidad de respuestas</th>
                  <th>Finalidad de la Lectura</th>
                  <th>%</th>
                </tr>';
       
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadDivertirse .'</center></td>
                <td width="40%"><center>Divertirse</center></td>
                <td width="30%"><center>'. $porcentaje_divertirse.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadInformarse .'</center></td>
                <td width="40%"><center>Informarse</center></td>
                <td width="30%"><center>'. $porcentaje_informarse.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadMejorartrabajo .'</center></td>
                <td width="40%"><center>Mejorar en el trabajo</center></td>
                <td width="30%"><center>'. $porcentaje_mejorartrabajo.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadConocimiento .'</center></td>
                <td width="40%"><center>Conocimiento</center></td>
                <td width="30%"><center>'. $porcentaje_conocimiento.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadOtro .'</center></td>
                <td width="40%"><center>Otro</center></td>
                <td width="30%"><center>'. $porcentaje_otro.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
    
    
    return $html;
       
       
   }
   
   
   static public function gustosypreferenciadelosencuestadossegungenerosliterarios($id_encuesta) {
       
     $html = '<center><h1>Gustos y  preferencia  de los encuestados según géneros literarios</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Género</th>
                    <th>Poesía</th>
                    <th>Narrativa</th>
                    <th>Ensayo</th>
                    <th>Teatro/Dramaturgia</th>
                    <th>Biografía/Testimonio</th>
                    <th>Otro</th>
                  </tr>';
       
    $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Sexo%')->findOne();
    $ItemGenero = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Cuáles son los géneros literarios que le han interesado dentro de la feria%')->findOne();
    
    if (count($Item) > 0) {
        $id_item = $Item->getId();
        $id_item_genero = $ItemGenero->getId();
        $Masculino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Masculino%')->findOne();
        $Femenino = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Femenino%')->findOne();
        if (count($Masculino) > 0 && count($Femenino) > 0) {
            
                $Poesia = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Poesía%')->findOne();
                $Narrativa = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Narrativa%')->findOne();
                $Ensayo = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Ensayo%')->findOne();
                $Teatro = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Teatro%')->findOne();
                $Biografia = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Biografia%')->findOne();
                $Otro = OpcionRespuestaQuery::create()->filterByIdItem($id_item_genero)->where('OpcionRespuesta.Opcion like ?', '%Otros%')->findOne();

                $id_poesia = $Poesia->getId();
                $id_narrativa = $Narrativa->getId();
                $id_ensayo = $Ensayo->getId();
                $id_teatro = $Teatro->getId();
                $id_biografia = $Biografia->getId();
                $id_otro = $Otro->getId();  
                
                $id_respuesta_masculino = $Masculino->getId();
                $id_respuesta_femenino = $Femenino->getId();
                $Hombres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_masculino )->find();
                $CantidadPoesiaH = 0; 
                $CantidadNarrativaH = 0; 
                $CantidadEnsayoH = 0; 
                $CantidadTeatroH = 0; 
                $CantidadBiografiaH = 0; 
                $CantidadOtroH = 0;   
                
             foreach ($Hombres as $Hombre) {

                    $id_encuesta_h = $Hombre->getIdRespuestaEncuesta();
                    $CantidadPoesiaH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_poesia)->count();
                    $CantidadNarrativaH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_narrativa)->count();
                    $CantidadEnsayoH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_ensayo)->count();
                    $CantidadTeatroH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_teatro)->count();
                    $CantidadBiografiaH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_biografia)->count();
                    $CantidadOtroH += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_h)->where('RespuestaItem.IdOpcion = '.$id_otro)->count();          

            }
                $Mujeres = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.IdOpcion = '.$id_respuesta_femenino )->find();
                $CantidadPoesiaM = 0; 
                $CantidadNarrativaM = 0; 
                $CantidadEnsayoM = 0; 
                $CantidadTeatroM = 0; 
                $CantidadBiografiaM = 0; 
                $CantidadOtroM = 0;   
                
             foreach ($Mujeres as $Mujer) {

                    $id_encuesta_m = $Mujer->getIdRespuestaEncuesta();
                    $CantidadPoesiaM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_poesia)->count();
                    $CantidadNarrativaM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_narrativa)->count();
                    $CantidadEnsayoM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_ensayo)->count();
                    $CantidadTeatroM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_teatro)->count();
                    $CantidadBiografiaM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_biografia)->count();
                    $CantidadOtroM += RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta_m)->where('RespuestaItem.IdOpcion = '.$id_otro)->count();        

            }
            
            $TotalH = $CantidadPoesiaH+$CantidadNarrativaH+$CantidadEnsayoH+$CantidadTeatroH+$CantidadBiografiaH+$CantidadOtroH;
            $porcentaje_poesia_h = round(($CantidadPoesiaH*100)/$TotalH,2);
            $porcentaje_narrativa_h = round(($CantidadNarrativaH*100)/$TotalH,2);
            $porcentaje_ensayo_h = round(($CantidadEnsayoH*100)/$TotalH,2);
            $porcentaje_teatro_h = round(($CantidadTeatroH*100)/$TotalH,2);
            $porcentaje_biografia_h = round(($CantidadBiografiaH*100)/$TotalH,2);
            $porcentaje_otro_h = round(($CantidadOtroH*100)/$TotalH,2);
 
            $TotalM = $CantidadPoesiaM+$CantidadNarrativaM+$CantidadEnsayoM+$CantidadTeatroM+$CantidadBiografiaM+$CantidadOtroM;
            $porcentaje_poesia_m = round(($CantidadPoesiaM*100)/$TotalM,2);
            $porcentaje_narrativa_m = round(($CantidadNarrativaM*100)/$TotalM,2);
            $porcentaje_ensayo_m = round(($CantidadEnsayoM*100)/$TotalM,2);
            $porcentaje_teatro_m = round(($CantidadTeatroM*100)/$TotalM,2);
            $porcentaje_biografia_m = round(($CantidadBiografiaM*100)/$TotalM,2);
            $porcentaje_otro_m = round(($CantidadOtroM*100)/$TotalM,2);            
            
        }
    }       
     
    $html .= '  <tr>
            <td><b><center>Masculino</center><b></td>
            <td><center>'. $porcentaje_poesia_h.'%</center></td>
            <td><center>'. $porcentaje_narrativa_h.'%</center></td>
            <td><center>'. $porcentaje_ensayo_h.'%</center></td>
            <td><center>'. $porcentaje_teatro_h.'%</center></td>
            <td><center>'. $porcentaje_biografia_h.'%</center></td>
            <td><center>'. $porcentaje_otro_h.'%</center></td>
          </tr>
          <tr>
            <td><b><center>Femenino</center><b></td>
            <td><center>'. $porcentaje_poesia_m.'%</center></td>
            <td><center>'. $porcentaje_narrativa_m.'%</center></td>
            <td><center>'. $porcentaje_ensayo_m.'%</center></td>
            <td><center>'. $porcentaje_teatro_m.'%</center></td>
            <td><center>'. $porcentaje_biografia_m.'%</center></td>
            <td><center>'. $porcentaje_otro_m.'%</center></td>
          </tr>  
        </table>
        <br>
        <br>';
    
        return $html;
       
   }
   

   static public function gustosypreferenciadelosencuestadosseguntematicas($id_encuesta) {
       
     $html = '<center><h1>Gustos y  preferencia  de los encuestados según temáticas</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Temática/Géneros</th>
                    <th>%</th>
                  </tr>';
       
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
    
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadCuentos .'</center></td>
                <td width="40%"><center>Cuentos</center></td>
                <td width="30%"><center>'. $porcentaje_cuentos.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadNovela .'</center></td>
                <td width="40%"><center>Novela</center></td>
                <td width="30%"><center>'. $porcentaje_novela.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadHistoria .'</center></td>
                <td width="40%"><center>Historia</center></td>
                <td width="30%"><center>'. $porcentaje_historia.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadCocina .'</center></td>
                <td width="40%"><center>Cocina</center></td>
                <td width="30%"><center>'. $porcentaje_cocina.'%</center></td>
              </tr>
               <tr>
                <td width="30%"><center>'. $CantidadInfantil .'</center></td>
                <td width="40%"><center>Infantil</center></td>
                <td width="30%"><center>'. $porcentaje_infantil.'%</center></td>
              </tr>
               <tr>
                <td width="30%"><center>'. $CantidadCientifico .'</center></td>
                <td width="40%"><center>Científico</center></td>
                <td width="30%"><center>'. $porcentaje_cientifico.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadAutoayuda .'</center></td>
                <td width="40%"><center>Autoayuda</center></td>
                <td width="30%"><center>'. $porcentaje_autoayuda.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadPoesia .'</center></td>
                <td width="40%"><center>Poesía</center></td>
                <td width="30%"><center>'. $porcentaje_poesia.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadReligion .'</center></td>
                <td width="40%"><center>Religión</center></td>
                <td width="30%"><center>'. $porcentaje_religion.'%</center></td>
              </tr>
              <tr>
                <td width="30%"><center>'. $CantidadPolitica .'</center></td>
                <td width="40%"><center>Política</center></td>
                <td width="30%"><center>'. $porcentaje_politica.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadArte .'</center></td>
                <td width="40%"><center>Arte</center></td>
                <td width="30%"><center>'. $porcentaje_arte.'%</center></td>
              </tr>
              <tr>
                <td width="30%"><center>'. $CantidadTecnico .'</center></td>
                <td width="40%"><center>Técnico</center></td>
                <td width="30%"><center>'. $porcentaje_tecnico.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadTextosescolares .'</center></td>
                <td width="40%"><center>Textos Escolares</center></td>
                <td width="30%"><center>'. $porcentaje_textosescolares.'%</center></td>
              </tr>
              <tr>
                <td width="30%"><center>'. $CantidadTextosuniversitarios .'</center></td>
                <td width="40%"><center>Textos Universitarios</center></td>
                <td width="30%"><center>'. $porcentaje_textosuniversitarios.'%</center></td>
              </tr>  
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
    
       return $html;
   } 
   
   
   static public function comoconsideralaofertaeditorial($id_encuesta) {
       
    $html = '<center><h1>¿Cómo considera la oferta editorial?</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Respuesta</th>
                    <th>%</th>
                  </tr>';
       
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
    
    
    $html .= '  <tr>
            <td width="30%"><center>'. $CantidadBuena .'</center></td>
            <td width="40%"><center>Buena</center></td>
            <td width="30%"><center>'. $porcentaje_buena.'%</center></td>
          </tr>  
          <tr>
            <td width="30%"><center>'. $CantidadMala .'</center></td>
            <td width="40%"><center>Mala</center></td>
            <td width="30%"><center>'. $porcentaje_mala.'%</center></td>
          </tr> 
          <tr>
            <td width="30%"><center>'. $CantidadRegular .'</center></td>
            <td width="40%"><center>Regular</center></td>
            <td width="30%"><center>'. $porcentaje_regular.'%</center></td>
          </tr>   
          <tr>
            <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
            <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
            <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
          </tr>   
        </table>
        <br>
        <br>';
       
    return $html;
       
   }
   
   
   static public function valoraciondeprecios($id_encuesta) {
       
       $html = '<center><h1>Valoración de precios</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Valoración de precios</th>
                    <th>%</th>
                  </tr>';
       
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadMaseconomicos .'</center></td>
                <td width="40%"><center>Más económicos</center></td>
                <td width="30%"><center>'. $porcentaje_maseconomicos.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadIguales .'</center></td>
                <td width="40%"><center>Iguales</center></td>
                <td width="30%"><center>'. $porcentaje_iguales.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadMaselevados .'</center></td>
                <td width="40%"><center>Más elevados</center></td>
                <td width="30%"><center>'. $porcentaje_maselevados.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
    
        return $html;
       
   }
   
   
   static public function conocimientodelareddelibreriasdelsur($id_encuesta) {
       
    $html = '<center><h1>Conocimiento de la Red de Librerías del Sur</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Respuestas</th>
                    <th>%</th>
                  </tr>';
       
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
    
    
    $html .= '  <tr>
                    <td width="30%"><center>'. $CantidadSi .'</center></td>
                    <td width="40%"><center>Sí</center></td>
                    <td width="30%"><center>'. $porcentaje_si.'%</center></td>
                  </tr>  
                  <tr>
                    <td width="30%"><center>'. $CantidadNo .'</center></td>
                    <td width="40%"><center>No</center></td>
                    <td width="30%"><center>'. $porcentaje_no.'%</center></td>
                  </tr> 
                  <tr>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
                  </tr>   
                </table>
                <br>
                <br>';
    
    return $html;
       
   }
   
   
   static public function recomendariaesteeventoaotraspersonas($id_encuesta) {
       
    $html = '<center><h1>Recomendaría este evento a otras personas</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Descriptivo</th>
                    <th>%</th>
                  </tr>';
       
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
    
    $html .= '  <tr>
                    <td width="30%"><center>'. $CantidadSi .'</center></td>
                    <td width="40%"><center>Sí</center></td>
                    <td width="30%"><center>'. $porcentaje_si.'%</center></td>
                  </tr>  
                  <tr>
                    <td width="30%"><center>'. $CantidadNo .'</center></td>
                    <td width="40%"><center>No</center></td>
                    <td width="30%"><center>'. $porcentaje_no.'%</center></td>
                  </tr> 
                  <tr>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                    <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                    <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
                  </tr>   
                </table>
                <br>
                <br>';
    
     return $html;
       
   }
   
   
   static public function comoseenteroustedsobrelaferiadellibro($id_encuesta) {
       
    $html = '<center><h1>¿Cómo se enteró usted sobre la feria del libro?</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Cantidad de respuestas</th>
                    <th>Descriptivo</th>
                    <th>%</th>
                  </tr>';
       
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
    
    $html .= '  <tr>
                <td width="30%"><center>'. $CantidadRadio .'</center></td>
                <td width="40%"><center>Radio</center></td>
                <td width="30%"><center>'. $porcentaje_radio.'%</center></td>
              </tr>  
              <tr>
                <td width="30%"><center>'. $CantidadPrensa .'</center></td>
                <td width="40%"><center>Prensa</center></td>
                <td width="30%"><center>'. $porcentaje_prensa.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadTelevision .'</center></td>
                <td width="40%"><center>Televisión</center></td>
                <td width="30%"><center>'. $porcentaje_television.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadAfiches .'</center></td>
                <td width="40%"><center>Afiches/Volantes</center></td>
                <td width="30%"><center>'. $porcentaje_afiches.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadRecomendacion .'</center></td>
                <td width="40%"><center>Recomendación personal</center></td>
                <td width="30%"><center>'. $porcentaje_recomendacion.'%</center></td>
              </tr> 
              <tr>
                <td width="30%"><center>'. $CantidadInternet .'</center></td>
                <td width="40%"><center>Internet</center></td>
                <td width="30%"><center>'. $porcentaje_internet.'%</center></td>
              </tr>   
              <tr>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'. $Total .'</b></center></td>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total</b></center></td>
                <td width="30%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>100%</b></center></td>
              </tr>   
            </table>
            <br>
            <br>';
       
     return $html;  
    
   }
   
    static public function valoracionfilvensegunvisitantes($id_encuesta) {
        
     $html = '<center><h1>Valoración FILVEN  según Visitantes</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Valoración FILVEN  según Visitantes</th>
                    <th>Buena</th>
                    <th>Regular</th>
                    <th>Malo</th>
                    <th>N/S N/C</th>
                    <th>Total</th>
                  </tr>';  
     $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Valore los siguientes aspectos, utilizando la escala del 1 al 4%')->findOne();
     if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Promocion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Promoción de la FILVEN%')->findOne();
        $Instalaciones = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Condición de las instalaciones en general%')->findOne();
        $Senalizacion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Señalización de los stand dentro del recinto ferial%')->findOne();
        $Guias = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Servicio de atención de guias y módulos de información%')->findOne();
        $Atencion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Atención de los expositores%')->findOne();
        $Organizacion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Organización del evento%')->findOne();   
        $Mantenimiento = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Mantenimiento del recinto ferial%')->findOne();
        
        $id_promocion = $Promocion->getId();
        $id_instalaciones = $Instalaciones->getId();
        $id_senalizacion = $Senalizacion->getId();
        $id_guias = $Guias->getId(); 
        $id_atencion = $Atencion->getId();
        $id_organizacion = $Organizacion->getId(); 
        $id_mantenimiento = $Mantenimiento->getId(); 
        
        $Promocion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_promocion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Promocion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_promocion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Promocion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_promocion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Promocion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_promocion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalPromocion = $Promocion1+$Promocion2+$Promocion3+$Promocion4;
        $porcentaje_promocion1 = round(($Promocion1*100)/$TotalPromocion,2);
        $porcentaje_promocion2 = round(($Promocion2*100)/$TotalPromocion,2);
        $porcentaje_promocion3 = round(($Promocion3*100)/$TotalPromocion,2);
        $porcentaje_promocion4 = round(($Promocion4*100)/$TotalPromocion,2);
        
        
        $Instalaciones1 = RespuestaItemQuery::create()->filterByIdOpcion($id_instalaciones)->where('RespuestaItem.Valor = ?', '1')->count();
        $Instalaciones2 = RespuestaItemQuery::create()->filterByIdOpcion($id_instalaciones)->where('RespuestaItem.Valor = ?', '2')->count();
        $Instalaciones3 = RespuestaItemQuery::create()->filterByIdOpcion($id_instalaciones)->where('RespuestaItem.Valor = ?', '3')->count();
        $Instalaciones4 = RespuestaItemQuery::create()->filterByIdOpcion($id_instalaciones)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalInstalaciones = $Instalaciones1+$Instalaciones2+$Instalaciones3+$Instalaciones4;
        $porcentaje_instalaciones1 = round(($Instalaciones1*100)/$TotalInstalaciones,2);
        $porcentaje_instalaciones2 = round(($Instalaciones2*100)/$TotalInstalaciones,2);
        $porcentaje_instalaciones3 = round(($Instalaciones3*100)/$TotalInstalaciones,2);
        $porcentaje_instalaciones4 = round(($Instalaciones4*100)/$TotalInstalaciones,2);        
        
        $Senalizacion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_senalizacion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Senalizacion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_senalizacion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Senalizacion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_senalizacion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Senalizacion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_senalizacion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalSenalizacion = $Senalizacion1+$Senalizacion2+$Senalizacion3+$Senalizacion4;
        $porcentaje_senalizacion1 = round(($Senalizacion1*100)/$TotalSenalizacion,2);
        $porcentaje_senalizacion2 = round(($Senalizacion2*100)/$TotalSenalizacion,2);
        $porcentaje_senalizacion3 = round(($Senalizacion3*100)/$TotalSenalizacion,2);
        $porcentaje_senalizacion4 = round(($Senalizacion4*100)/$TotalSenalizacion,2);        
        
        $Guias1 = RespuestaItemQuery::create()->filterByIdOpcion($id_guias)->where('RespuestaItem.Valor = ?', '1')->count();
        $Guias2 = RespuestaItemQuery::create()->filterByIdOpcion($id_guias)->where('RespuestaItem.Valor = ?', '2')->count();
        $Guias3 = RespuestaItemQuery::create()->filterByIdOpcion($id_guias)->where('RespuestaItem.Valor = ?', '3')->count();
        $Guias4 = RespuestaItemQuery::create()->filterByIdOpcion($id_guias)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalGuias = $Guias1+$Guias2+$Guias3+$Guias4;
        $porcentaje_guias1 = round(($Guias1*100)/$TotalGuias,2);
        $porcentaje_guias2 = round(($Guias2*100)/$TotalGuias,2);
        $porcentaje_guias3 = round(($Guias3*100)/$TotalGuias,2);
        $porcentaje_guias4 = round(($Guias4*100)/$TotalGuias,2);        
        
        $Atencion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Atencion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Atencion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Atencion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalAtencion = $Atencion1+$Atencion2+$Atencion3+$Atencion4;
        $porcentaje_atencion1 = round(($Atencion1*100)/$TotalAtencion,2);
        $porcentaje_atencion2 = round(($Atencion2*100)/$TotalAtencion,2);
        $porcentaje_atencion3 = round(($Atencion3*100)/$TotalAtencion,2);
        $porcentaje_atencion4 = round(($Atencion4*100)/$TotalAtencion,2);        
        
        $Organizacion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Organizacion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Organizacion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Organizacion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalOrganizacion = $Organizacion1+$Organizacion2+$Organizacion3+$Organizacion4;
        $porcentaje_organizacion1 = round(($Organizacion1*100)/$TotalOrganizacion,2);
        $porcentaje_organizacion2 = round(($Organizacion2*100)/$TotalOrganizacion,2);
        $porcentaje_organizacion3 = round(($Organizacion3*100)/$TotalOrganizacion,2);
        $porcentaje_organizacion4 = round(($Organizacion4*100)/$TotalOrganizacion,2);        
        
        $Mantenimiento1 = RespuestaItemQuery::create()->filterByIdOpcion($id_mantenimiento)->where('RespuestaItem.Valor = ?', '1')->count();
        $Mantenimiento2 = RespuestaItemQuery::create()->filterByIdOpcion($id_mantenimiento)->where('RespuestaItem.Valor = ?', '2')->count();
        $Mantenimiento3 = RespuestaItemQuery::create()->filterByIdOpcion($id_mantenimiento)->where('RespuestaItem.Valor = ?', '3')->count();
        $Mantenimiento4 = RespuestaItemQuery::create()->filterByIdOpcion($id_mantenimiento)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        $TotalMantenimiento = $Mantenimiento1+$Mantenimiento2+$Mantenimiento3+$Mantenimiento4;
        $porcentaje_mantenimiento1 = round(($Mantenimiento1*100)/$TotalMantenimiento,2);
        $porcentaje_mantenimiento2 = round(($Mantenimiento2*100)/$TotalMantenimiento,2);
        $porcentaje_mantenimiento3 = round(($Mantenimiento3*100)/$TotalMantenimiento,2);
        $porcentaje_mantenimiento4 = round(($Mantenimiento4*100)/$TotalMantenimiento,2);        
        
     }
     
         $html .= '  <tr>
                <td width="40%"><center>'. $Promocion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_promocion1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_promocion2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_promocion3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_promocion4.'%</center></td>
                <td width="12%"><center>100%</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Instalaciones->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_instalaciones1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_instalaciones2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_instalaciones3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_instalaciones4.'%</center></td>
                <td width="12%"><center>100%</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Senalizacion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_senalizacion1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_senalizacion2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_senalizacion3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_senalizacion4.'%</center></td>
                <td width="12%"><center>100%</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Guias->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_guias1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_guias2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_guias3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_guias4.'%</center></td>
                <td width="12%"><center>100%</center></td>
              </tr>
              <tr>
              <td width="40%"><center>'. $Atencion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_atencion1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_atencion2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_atencion3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_atencion4.'%</center></td>
                <td width="12%"><center>100%</center></td> 
              </tr>
              <tr>
                <td width="40%"><center>'. $Organizacion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_organizacion1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_organizacion2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_organizacion3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_organizacion4.'%</center></td>
                <td width="12%"><center>100%</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Mantenimiento->getOpcion() .'</center></td>
                <td width="12%"><center>'.$porcentaje_mantenimiento1.'%</center></td>
                <td width="12%"><center>'.$porcentaje_mantenimiento2.'%</center></td>
                <td width="12%"><center>'.$porcentaje_mantenimiento3.'%</center></td>
                <td width="12%"><center>'.$porcentaje_mantenimiento4.'%</center></td>
                <td width="12%"><center>100%</center></td>              
              </tr></table><br><br>';
         
         
         return $html;
  
        
    }
   
 /******************************************************
  *                                                    *
  *                                                    *
  *                 RESULTADOS                         *
  *           ENCUESTAS DE EXPOSITOR                   *
  *                                                    *
  *                                                    *   
  ******************************************************/ 

   static public function expositoresinternacionales($id_encuesta) {
       
     $html = '<center><h1>Expositores participantes</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Expositor Representante</th>                  
                    <th>País de procedencia</th>
                  </tr>';
     
      $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Nombre de la editorial que representa%')->findOne();
      if (count($Item) > 0) { 
          $id_item = $Item->getId();
          $Editoriales = RespuestaItemQuery::create()->filterByIdItem($id_item)->orderByValor('asc')->find();
          $arreglo_editorial = array();
          $arreglo_cantidad_paises = array();
          $editorial_anterior = '';
          //$TotalExpositor = 0;
          $TotalExpositor=count($Editoriales);
          $TotalPais = 0;
          $i = 0;
          $c_expositor_nacional=0;
          $c_expositor_internacional=0;
          
          foreach($Editoriales as $Editorial) {
              $editorial_actual = $Editorial->getValor();
              
              $respuesta_encuesta = $Editorial->getIdRespuestaEncuesta();
              $Pais = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%País%')->findOne();
              $id_pais = $Pais->getId();
              $PaisExp = RespuestaItemQuery::create()->filterByIdItem($id_pais)->where('RespuestaItem.IdRespuestaEncuesta = ?', $respuesta_encuesta)->orderByValor('asc')->findOne();             
              if ( trim(strtoupper($PaisExp->getValor()))=='VENEZUELA') {
                  $c_expositor_nacional++;
              }
              if ($PaisExp->getValor() != 'Venezuela' )  {
                    if ($editorial_anterior == $editorial_actual) {
                       $arreglo_editorial[$editorial_actual] = $arreglo_editorial[$editorial_actual].'<br>'.$PaisExp->getValor();
                       $arreglo_cantidad_paises[$i] = $PaisExp->getValor();
                       
                    } else {
                       $arreglo_editorial[$editorial_actual] = $PaisExp->getValor();
                       $arreglo_cantidad_paises[$i] = $PaisExp->getValor();
                       
                    }
                    $editorial_anterior = $editorial_actual;
  //                  $TotalExpositor++;
                    $i++;
              }
          }
      }
      
      
      
      
      $paises = array_unique($arreglo_cantidad_paises);
      
      $TotalPais = sizeof($paises);
      $c_expositor_internacional=$TotalPais -1;
      
      foreach ($arreglo_editorial as $key => $val) {
           $html .= '<tr><td><center>'.$key.'</center></td><td><center>'.$val.'</center></td>';
      }     
      $html .= '<tr>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total países participantes</b></center></td>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$c_expositor_internacional .'</b></center></td>
                </tr>
                <tr>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total Expositores nacionales participantes</b></center></td>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$c_expositor_nacional.'</b></center></td>
                </tr>                
                
                <tr>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total Expositores  participantes</b></center></td>
                    <td style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$TotalExpositor.'</b></center></td>
                </tr>                
                
                    ';      
      
      $html .= '</table><br><br>';
     
      return $html;
     
   }
    
   static public function valoracionfilvensegunexpositores($id_encuesta) {
       
     $html = '<center><h1>Valoración FILVEN  según Expositores</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Valoración FILVEN  según Visitantes</th>
                    <th>Buena</th>
                    <th>Regular</th>
                    <th>Malo</th>
                    <th>N/S N/C</th>
                  </tr>';
      $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Valore los siguientes aspectos utilizando una escala del 1 al 4%')->findOne();
      if (count($Item) > 0) {
        $id_item = $Item->getId();
        $Ubicacion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Ubicación del recinto ferial%')->findOne();
        $Transporte = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Transporte hacia y desde el recinto ferial%')->findOne();
        $Organizacion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Organización del evento%')->findOne();
        $Atencion = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Atención al expositor%')->findOne();
        $Stand = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Montaje del Stand%')->findOne();
        $Higiene = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Higiene de los servicios sanitarios%')->findOne();
        $Ambiente = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Ambiente general de la FILVEN%')->findOne();        
        
        $id_ubicacion = $Ubicacion->getId();
        $id_transporte = $Transporte->getId();
        $id_organizacion = $Organizacion->getId();
        $id_atencion = $Atencion->getId();
        $id_stand = $Stand->getId();
        $id_higiene = $Higiene->getId();
        $id_ambiente = $Ambiente->getId();
        
        $Ubicacion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_ubicacion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Ubicacion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_ubicacion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Ubicacion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_ubicacion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Ubicacion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_ubicacion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();       
        
        $Transporte1 = RespuestaItemQuery::create()->filterByIdOpcion($id_transporte)->where('RespuestaItem.Valor = ?', '1')->count();
        $Transporte2 = RespuestaItemQuery::create()->filterByIdOpcion($id_transporte)->where('RespuestaItem.Valor = ?', '2')->count();
        $Transporte3 = RespuestaItemQuery::create()->filterByIdOpcion($id_transporte)->where('RespuestaItem.Valor = ?', '3')->count();
        $Transporte4 = RespuestaItemQuery::create()->filterByIdOpcion($id_transporte)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        
        $Organizacion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Organizacion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Organizacion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Organizacion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_organizacion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();        

        $Atencion1 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '1')->count();
        $Atencion2 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '2')->count();
        $Atencion3 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor = ?', '3')->count();
        $Atencion4 = RespuestaItemQuery::create()->filterByIdOpcion($id_atencion)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        
        $Stand1 = RespuestaItemQuery::create()->filterByIdOpcion($id_stand)->where('RespuestaItem.Valor = ?', '1')->count();
        $Stand2 = RespuestaItemQuery::create()->filterByIdOpcion($id_stand)->where('RespuestaItem.Valor = ?', '2')->count();
        $Stand3 = RespuestaItemQuery::create()->filterByIdOpcion($id_stand)->where('RespuestaItem.Valor = ?', '3')->count();
        $Stand4 = RespuestaItemQuery::create()->filterByIdOpcion($id_stand)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();
        
        $Higiene1 = RespuestaItemQuery::create()->filterByIdOpcion($id_higiene)->where('RespuestaItem.Valor = ?', '1')->count();
        $Higiene2 = RespuestaItemQuery::create()->filterByIdOpcion($id_higiene)->where('RespuestaItem.Valor = ?', '2')->count();
        $Higiene3 = RespuestaItemQuery::create()->filterByIdOpcion($id_higiene)->where('RespuestaItem.Valor = ?', '3')->count();
        $Higiene4 = RespuestaItemQuery::create()->filterByIdOpcion($id_higiene)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();        
      
        $Ambiente1 = RespuestaItemQuery::create()->filterByIdOpcion($id_ambiente)->where('RespuestaItem.Valor = ?', '1')->count();
        $Ambiente2 = RespuestaItemQuery::create()->filterByIdOpcion($id_ambiente)->where('RespuestaItem.Valor = ?', '2')->count();
        $Ambiente3 = RespuestaItemQuery::create()->filterByIdOpcion($id_ambiente)->where('RespuestaItem.Valor = ?', '3')->count();
        $Ambiente4 = RespuestaItemQuery::create()->filterByIdOpcion($id_ambiente)->where('RespuestaItem.Valor != ?', '1')->where('RespuestaItem.Valor != ?', '2')->where('RespuestaItem.Valor != ?', '3')->count();        
        
        $Total1 = $Ubicacion1+$Transporte1+$Organizacion1+$Atencion1+$Stand1+$Higiene1+ $Ambiente1;
        $Total2 = $Ubicacion2+$Transporte2+$Organizacion2+$Atencion2+$Stand2+$Higiene2+ $Ambiente2;
        $Total3 = $Ubicacion3+$Transporte3+$Organizacion3+$Atencion3+$Stand3+$Higiene3+ $Ambiente3;
        $Total4= $Ubicacion4+$Transporte4+$Organizacion4+$Atencion4+$Stand4+$Higiene4+ $Ambiente4;
      }
      
          $html .= '<tr>
                <td width="40%"><center>'. $Ubicacion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Ubicacion1.'</center></td>
                <td width="12%"><center>'.$Ubicacion2.'</center></td>
                <td width="12%"><center>'.$Ubicacion3.'</center></td>
                <td width="12%"><center>'.$Ubicacion4.'</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Transporte->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Transporte1.'</center></td>
                <td width="12%"><center>'.$Transporte2.'</center></td>
                <td width="12%"><center>'.$Transporte3.'</center></td>
                <td width="12%"><center>'.$Transporte4.'</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Organizacion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Organizacion1.'</center></td>
                <td width="12%"><center>'.$Organizacion2.'</center></td>
                <td width="12%"><center>'.$Organizacion3.'</center></td>
                <td width="12%"><center>'.$Organizacion4.'</center></td>
              </tr>
             <tr>
                <td width="40%"><center>'. $Atencion->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Atencion1.'</center></td>
                <td width="12%"><center>'.$Atencion2.'</center></td>
                <td width="12%"><center>'.$Atencion3.'</center></td>
                <td width="12%"><center>'.$Atencion4.'</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Stand->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Stand1.'</center></td>
                <td width="12%"><center>'.$Stand2.'</center></td>
                <td width="12%"><center>'.$Stand3.'</center></td>
                <td width="12%"><center>'.$Stand4.'</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Higiene->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Higiene1.'</center></td>
                <td width="12%"><center>'.$Higiene2.'</center></td>
                <td width="12%"><center>'.$Higiene3.'</center></td>
                <td width="12%"><center>'.$Higiene4.'</center></td>
              </tr>
              <tr>
                <td width="40%"><center>'. $Ambiente->getOpcion() .'</center></td>
                <td width="12%"><center>'.$Ambiente1.'</center></td>
                <td width="12%"><center>'.$Ambiente2.'</center></td>
                <td width="12%"><center>'.$Ambiente3.'</center></td>
                <td width="12%"><center>'.$Ambiente4.'</center></td>
              </tr> 
              <tr>
                <td width="40%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>Total de respuestas</b></center></td>
                <td width="12%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total1.'</b></center></td>
                <td width="12%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total2.'</b></center></td>
                <td width="12%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total3.'</b></center></td>
                <td width="12%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total4.'</b></center></td>
              </tr>               
             </table><br><br>             
              ';
          
     return $html;
   } 
   
   static public function generosmascomercializados($id_encuesta) {
       
     $html = '<center><h1>Géneros más comercializados</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Género</th>
                    <th>Nro</th>
                  </tr>';
     
     $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Señale los tres títulos de libros mas vendidos%')->findOne();
     
     if (count($Item) > 0) { 
        $id_item = $Item->getId(); 
        $Genero = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Género%')->findOne();
        $RespuestaEncuesta = RespuestaItemQuery::create()
                        ->select('Valor')
                        ->setDistinct('Valor')
                        ->filterByIdOpcion($Genero->getId())
                        ->find();
        
       // $Total = RespuestaItemQuery::create()->filterByIdOpcion($Genero->getId())->where('RespuestaItem.IdOpcion IS NOT NULL')->count();
        $Total=count($RespuestaEncuesta);
        
        foreach($RespuestaEncuesta as $Respuesta) {
            $Resultado = RespuestaItemQuery::create()->filterByIdOpcion($Genero->getId())->where('RespuestaItem.Valor like ?', $Respuesta)->count();
            //$porcentaje_resultado = round(($Resultado*100)/$Total,2);
            $total_resultado = $Resultado;
            //$html .= '<tr><td><center>'.$Respuesta.'</center></td><td><center>'.$porcentaje_resultado.'%</center></td></tr>';
            $html .= '<tr><td><center>'.$Respuesta.'</center></td><td><center>'. $total_resultado .'</center></td></tr>';
        }
        
     }   
     
     $html .= '<tr><td><center>Total de Géneros</center></td><td><center>'.$Total.'<center></td></tr></table><br><br>';
     
     return $html;
     
   }
   
   static public function adquisiciondeejemplares($id_encuesta) {
       
       /* HAY QUE AGREGARLE LA OPCION PARA LA COMPARACION ENTRE FERIAS */
       
      $html = '<center><h1>Adquisición de ejemplares por el público asistente dentro de la Fundación Librerías del Sur</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Año</th>
                    <th>N° Ejemplares vendidos</th>
                    <th>N° Clientes atendidos</th>
                    <th>Total de ventas en Bs.</th>
                  </tr>';
      
      $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Nombre de la editorial que representa%')->findOne();
      if (count($Item) > 0) { 
        $id_item = $Item->getId();
        $EjemplaresVendidos = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Señale el total de ejemplares vendidos%')->findOne();
        $id_ejemplares = $EjemplaresVendidos->getId();
        $Visitantes = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Señale el número promedio del total de visitantes a su Stand%')->findOne();
        $id_visitantes = $Visitantes->getId();
        $Precio = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Señale el total de ventas en Bolívares%')->findOne();
        $id_precio = $Precio->getId();        
        $LibreriaSur = RespuestaItemQuery::create()->filterByIdItem($id_item)->where('RespuestaItem.Valor like ?', '% del Sur%')->find();
        $Total_ejemplar = 0;
        $Total_visitante = 0;
        $Total_precio = 0;
        
        foreach ($LibreriaSur as $Libreria) {
            $respuesta_encuesta = $Libreria->getIdRespuestaEncuesta();
            $Ejemplares = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($respuesta_encuesta)->where('RespuestaItem.IdItem = ?', $id_ejemplares)->findOne();
            $Total_ejemplar += $Ejemplares->getValor();
            $Visitantes = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($respuesta_encuesta)->where('RespuestaItem.IdItem = ?', $id_visitantes)->findOne();
            $Total_visitante += $Visitantes->getValor();
            $Precios = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($respuesta_encuesta)->where('RespuestaItem.IdItem = ?', $id_precio)->findOne();
            $Total_precio += $Precios->getValor();            
        }
      }
      
      $html .=  '<tr>
                <td width="25%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>2012</b></center></td>
                <td width="25%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total_ejemplar.'</b></center></td>
                <td width="25%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total_visitante.'</b></center></td>
                <td width="25%" style="background-color: #0c131b; color:white; border : 1px solid  #979696;"><center><b>'.$Total_precio.'</b></center></td>
              </tr>               
             </table><br><br>             
              ';
        
     return $html; 
      
   }
   
   static public function librosmasvendidosycantidaddeejemplares($id_encuesta) {

     $html = '<center><h1>Libros más vendidos y cantidad de ejemplares</h1></center>
                <table class="tablas">
                  <tr>
                    <th>N°</th>
                    <th>Títulos</th>
                    <th>Autor</th>
                    <th>Géneros</th>
                    <th>Total de ejemplares</th>
                  </tr>';
     
     $Item = ItemQuery::create()->filterByIdEncuesta($id_encuesta)->where('Item.Texto like ?', '%Señale los tres títulos de libros mas vendidos%')->findOne();
     
     if (count($Item) > 0) { 
        $id_item = $Item->getId(); 
        $Titulo = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Título%')->findOne();
        $CantidadEjemplares = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Cantidad de ejemplares vendidos%')->findOne();
        $id_cantidad = $CantidadEjemplares->getId();
        $CantidadGenero = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Género%')->findOne();
        $id_genero = $CantidadGenero->getId();
        $CantidadAutor = OpcionRespuestaQuery::create()->filterByIdItem($id_item)->where('OpcionRespuesta.Opcion like ?', '%Autor%')->findOne();
        $id_autor = $CantidadAutor->getId();       
        $RespuestaEncuesta = RespuestaItemQuery::create()
                        ->select('Valor')
                        ->setDistinct('Valor')
                        ->filterByIdOpcion($Titulo->getId())
                        ->find();
        
        $arreglo = array();
        $NombreGenero = '';
        $NombreAutor = '';
        foreach($RespuestaEncuesta as $Respuesta) {
            $Resultados = RespuestaItemQuery::create()->filterByIdOpcion($Titulo->getId())->where('RespuestaItem.Valor like ?', $Respuesta)->find();
            $ContarCantidadEjemplares = 0;
            $i = 0;
            foreach($Resultados as $Resultado) {
               $id_encuesta = $Resultado->getIdRespuestaEncuesta();
               $i = 1;
               $TituloEncuestas = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta)->where('RespuestaItem.IdOpcion = ?', $Titulo->getId())->orderById('asc')->find();
               foreach($TituloEncuestas as $TituloEncuesta) {
                   if ($TituloEncuesta->getValor() == $Respuesta) {
                       $contador = $i;
                   }
                   $i++;
               }
               $Ejemplares = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta)->where('RespuestaItem.IdOpcion = ?', $id_cantidad)->orderById('asc')->find();
               $i = 1;
               foreach($Ejemplares as $Ejemplar) {
                   if ($i == $contador) {
                      $ContarCantidadEjemplares += intval($Ejemplar->getValor()); 
                   }
                   $i++;
               }
               $Generos = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta)->where('RespuestaItem.IdOpcion = ?', $id_genero)->orderById('asc')->find();
               $i = 1;
               foreach($Generos as $Genero) {
                   if ($i == $contador) {
                      $NombreGenero = $Genero->getValor(); 
                   }
                   $i++;
               } 
               $Autores = RespuestaItemQuery::create()->filterByIdRespuestaEncuesta($id_encuesta)->where('RespuestaItem.IdOpcion = ?', $id_autor)->orderById('asc')->find();
               $i = 1;
               foreach($Autores as $Autor) {
                   if ($i == $contador) {
                      $NombreAutor = $Autor->getValor(); 
                   }
                   $i++;
               }
               $key = $Respuesta.'^'.$NombreGenero.'^'.$NombreAutor;
               $arreglo[$key] = $ContarCantidadEjemplares;
            }
            
            // ordeno el arreglo de mayor a menor
       }
        arsort($arreglo);
        
     }   
    $i = 1; 
    foreach ($arreglo as $key => $val) {
        list($titulo,$genero,$autor) = explode('^',$key);
        $html .= '<tr><td><center>'.$i.'</center></td><td><center>'.$titulo.'</center></td><td><center>'.$genero.'</center></td><td><center>'.$autor.'</center></td><td><center>'.$val.'</center></td>';
        $i++;
    }
    $html .= '</table><br><br>';
     
     return $html;
     
   }   
    
} // InformeQuery
