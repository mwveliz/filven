<?php

     $html = '<center><h1>Proyección Nacional e Internacional de '.$Feria->getDescripcion().'</h1></center>
                <table class="tablas">
                  <tr>
                    <th>Descriptivo</th>
                    <th>'.$Feria->getDescripcion().'</th>
                  </tr>';
     
     // Nº de Visitantes al Recinto Ferial (Caracas)<
     $VisitanteFeria = VisitanteQuery::create()->filterByIdFeria($Feria->getId())->find();
     $suma = 0;
     foreach($VisitanteFeria as $VFeria) {
           $suma += $VFeria->getNumero();
     }
     
     // N° de países participantes Encuesta expositor

     
     
     // Cantidad de Escritores participantess
         $id_feria = $Feria->getId();
         $Actividades = ActividadQuery::create()->filterByIdFeria($id_feria)->find();
         $TotalEscritor = 0;
         $Extranjero = 0;
         $Nacional = 0;
         foreach($Actividades as $Actividad) {
             $id_actividad = $Actividad->getId();
             $PonentesActividads = PonenteRelActividadQuery::create()->filterByIdActividad($id_actividad)->find();
             foreach ($PonentesActividads as $PonentesActividad) {
                 $id_ponente = $PonentesActividad->getIdPonente();
                 $Ponente = PonenteQuery::create()->filterById($id_ponente)->where('Ponente.Especialidad like ?', '%Escritor%')->findOne();
                 if (count($Ponente) > 0) {
                     if ($Ponente->getNacionalidad()  == 'Extranjero') {
                         $Extranjero++;
                     } else {
                         $Nacional++;
                     }
                 }
             }
         }
         $TotalEscritor = $Nacional+$Extranjero;     
         
         
      // N° de países participantes Encuesta expositor
      // Cantidad de Escritores participantes
      // Cantidad de Expositores Nacionales Participantes 
      // Cantidad de Expositores Internacionales Participantes  
      $Item = ItemQuery::create()->filterByIdEncuesta(17)->where('Item.Texto like ?', '%Nombre de la editorial que representa%')->findOne();
      if (count($Item) > 0) { 
          $arreglo_cantidad_paises = array();
          $TotalPais = 0;
          $TotalExpositorInternacional = 0;
          $TotalExpositorNacional = 0;
          $i = 0;

              $Pais = ItemQuery::create()->filterByIdEncuesta(17)->where('Item.Texto like ?', '%País%')->findOne();
              $id_pais = $Pais->getId();
              $RespuestaEncuestas = RespuestaEncuestaQuery::create()
                    ->filterByIdEncuesta(17)
                    ->condition('cond1', 'RespuestaEncuesta.Fecha >= ?', $Feria->getFechaInicio())
                    ->condition('cond2', 'RespuestaEncuesta.Fecha <= ?', $Feria->getFechaFin())
                    ->where(array('cond1', 'cond2'), 'and')
                    ->find();
                foreach ($RespuestaEncuestas as $RespuestaEncuesta) {
                      $PaisExp = RespuestaItemQuery::create()->filterByIdItem($id_pais)->where('RespuestaItem.IdRespuestaEncuesta = ?', $RespuestaEncuesta->getId())->orderByValor('asc')->findOne();
                        if ($PaisExp->getValor() != 'Venezuela' )  {
                              $arreglo_cantidad_paises[$i] = $PaisExp->getValor();
			      $TotalExpositorInternacional++;
                              $i++; 
                        } else {
			      $TotalExpositorNacional++;	
			}           

                }
          
          $TotalExpositor = $TotalExpositorNacional + $TotalExpositorInternacional;
           
      }
      $paises = array_unique($arreglo_cantidad_paises);
      $TotalPais = sizeof($paises);         
         

        // Nº Total de actividades  ejecutadas
        // Nº Total de público asistente en las actividades

        $id_feria = $Feria->getId();
        $TotalActividades = 0;
        $TotalParticipantes = 0;
        $CantidadActividades = ActividadQuery::create()->filterByIdFeria($id_feria)->count();
        $TotalActividades += $CantidadActividades;
        $Actividades = ActividadQuery::create()->filterByIdFeria($id_feria)->find();
        $CantidadParticipantes = 0;
        foreach ($Actividades as $Actividad) {
            $cantidad_hombre = $Actividad->getCantidadParticipantesM();
            $cantidad_mujer = $Actividad->getCantidadParticipantesF();
            $CantidadParticipantes += $cantidad_hombre;
            $CantidadParticipantes += $cantidad_mujer;
        }
        $TotalParticipantes += $CantidadParticipantes;        
        
     $html .= '<tr>
                <td><center>Nº de Visitantes al Recinto Ferial (Caracas)</center></td>
                <td><center>'.$suma.'</center></td>
               </tr>
               <tr>
                <td><center>N° de países participantes Encuesta expositor </center></td>
                <td><center>'.$TotalPais.'</center></td>
               </tr>               
               <tr>
                <td><center>Cantidad de Escritores participantes</center></td>
                <td><center>'.$TotalEscritor.'</center></td>
               </tr>
               <tr>
                <td><center>Nº Total de Expositores Participantes</center></td>
                <td><center>'.$TotalExpositor.'</center></td>
               </tr>
               <tr>
                <td><center>Cantidad de Expositores Nacionales Participantes</center></td>
                <td><center>'.$TotalExpositorNacional.'</center></td>
               </tr>
               <tr>
                <td><center>Cantidad de Expositores Internacionales Participantes</center></td>
                <td><center>'.$TotalExpositorInternacional.'</center></td>
               </tr>
               <tr>
                <td><center>Nº Total de actividades  ejecutadas</center></td>
                <td><center>'.$TotalActividades.'</center></td>
               </tr>
               <tr>
                <td><center>Nº Total de público asistente en las actividades</center></td>
                <td><center>'.$TotalParticipantes.'</center></td>
               </tr>
    ';
     
     
     $html .= '</table>';
     
     echo $html;
?>
