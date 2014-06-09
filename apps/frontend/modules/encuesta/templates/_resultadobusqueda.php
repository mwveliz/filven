<table class="show_encuesta">
    <tr>
        <td>
            <table class="show_interna_encuesta">
                <tr>
                    <td style="padding-left: 50px;">
                       <p style="vertical-align: middle;"><? echo image_tag('logo_mini.jpg')  ?> </p> 
                    </td>
                    <td>
                        
                        <?
                          $tipo_encuesta=  $Encuesta->getTipoEncuesta();
                          $ET=  EncuestaQuery::create()->filterByTipoEncuesta($tipo_encuesta)->orderById('asc')->findOne();
                          $id_tipo=$ET->getId();
                          $numero_encuesta=$RespuestaEncuesta->getNumeroEncuesta();
                          $fecha=$RespuestaEncuesta->getFecha();
                          $hora=$RespuestaEncuesta->getHora();
                          $nombre=$RespuestaEncuesta->getNombre();
                          $apellido= $RespuestaEncuesta->getApellido();
                          $telefono=$RespuestaEncuesta->getTelefono();
                          $email= $RespuestaEncuesta->getEmail();
                          $observacion =$RespuestaEncuesta->getObservacion();
                          $id_respuesta_encuesta=$RespuestaEncuesta->getId();
                          
                          //si es encuesta visitante
                          if ($tipo_encuesta=='Visitante'){
                              
                              $RespuestaItem = RespuestaItemQuery::create()->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                              
                          }else{//si es expositor
                              
                              
                          }
                          ?>  
                        
                        
                        <p style="vertical-align: middle;"><b>Encuesta para <? echo $tipo_encuesta?></b></p>
                        
                          
                    </td>
                    <td>
                        <p  style="vertical-align: middle;"><span style="padding-left: 10px;">Fecha: </span>
                            <input name="fecha" value="<?php echo $fecha  ?>" class="input_show_min"> <a href="#" class="salva" id="1" > <img src="/images/check-icon.png"> </a>
                            <span style="padding-left: 10px;">Hora: </span>
                            <input name="hora" value="<?php echo $hora  ?>" class="input_show_min"> <a href="#" class="salva" id="2" > <img src="/images/check-icon.png"> </a>
                            <span style="padding-left: 10px;">N° de encuesta: </span> 
                            <input name="3" name="numero_encuesta" class="input_show_min" value="<?php echo $numero_encuesta  ?> "> <a href="#" class="salva" id="3" > <img src="/images/check-icon.png"> </a></p>
                    </td>
                </tr>
            </table> 
        </td>
    </tr>
    <tr>
        <td style="padding-left:50px;"><hr></td>
    </tr> 
    <tr>
        <td>
            <?// $Items = ItemQuery::create()->filterByIdEncuesta($Encuesta->getId())->orderByNumeracion('asc')->find(); 
            $Items = ItemQuery::create()->filterByIdEncuesta($id_tipo)->orderByNumeracion('asc')->find(); 
                if (count($Items) > 0) {
                    foreach ($Items as $Item) {
                       $id_item=$Item->getId();
                       $RI= RespuestaItemQuery::create()->filterByIdItem($Item->getId())->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                       
                        $caso = $Item->getTipoItem();
                        switch ($caso) {
                            case 'A': //completacion
                               $valor= $RI->getValor();
                               echo '<p id="'.$Item->getId() .'" style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><input name="'.$Item->getId().'" class="input_show_med" value="'. $valor.'" >';
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;

                            case 'B': //seleccion simple
                               $checked='';
                               $pre = '<br><p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if ($id_opcion== $RI->getIdOpcion() ) $checked='checked';
                                       $radio .= '<input '.$checked.' style="padding-right: 30px;" type="radio" name="'.$id_item.'[]"  value="'.$id_opcion.'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';
                                   $checked='';
                                   }
                               }
                               $post = $pre.$texto.$radio.'</span></p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                               
                           break; 
                           
                            case 'C': //seleccion simple con completacion
                              $checked='';
                              $valor='';
                              $valor= $RI->getValor();
                              $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   $i= 0;
                                   $count = count($OpcionRespuestas);
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if ($id_opcion== $RI->getIdOpcion() ) $checked='checked';
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $radio .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input '. $checked .' name="'.$id_item.'otro"  value="" class="input_show_med" style=" text-transform:uppercase;">';
                                       } else {
                                           $radio .= '<input style="padding-right: 30px; " type="radio" name="'.$id_item.'[]"  value="'.$valor.'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';  
                                       }
                                       $i++;
                                       $checked='';
                                   }
                               }
                               $post = $pre.$texto.$radio.'<span></p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;  
                           
                            case 'D': //seleccion multiple
                               $checked='';
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $i = 1;
                                   $checkbox = '';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if ($id_opcion== $RI->getIdOpcion() ) $checked='checked';
                                       $checkbox .= '<span style="padding-left:70px;"><b>'.$i.'. </b><input '.$checked.' style="padding-right: 30px;  text-transform:uppercase;" type="checkbox" name="'.$id_item.'[]" value="'.$id_opcion.'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                       $i++;
                                       $checked='';
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break; 
                           
                            case 'E': //completacion multiple - caso estado municipio parroquia y pais
                                //debo usar varios RI debido a que no se si se refiere o no a un estado municipio parroquia o pais debe corregirse al grabar que guarde el id_opcion
                                if($tipo_encuesta=='Visitante'){
                                $RIPais=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(57)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RIEstado=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(58)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RIMunicipio=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(59)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RIParroquia=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(60)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                }else{
                                $RIPais=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(152)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RIEstado=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(153)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RIMunicipio=RespuestaItemQuery::create()->filterByIdItem($Item->getId())->filterByIdOpcion(154)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                }
                                
                                
                                    
                               $valor='';
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $input = '<table>';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       
                                      if ( $OpcionRespuesta->getOpcion() == 'Parroquia' || $OpcionRespuesta->getOpcion() == 'Municipio' ||  $OpcionRespuesta->getOpcion() == 'Estado' || $OpcionRespuesta->getOpcion() == 'País' ){
                                           if($OpcionRespuesta->getOpcion() == 'Parroquia' and $tipo_encuesta=='Visitante' ) {
                                               $Parroquias= ParroquiaQuery::create()->orderByDescripcion('asc')->find();
                                                $input  .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td>';
                                            //    $input  = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span>';
                                                $input .= '<td><select name='.$id_item.'[]'.' id='.$id_item.' class="parroquia">';
                                                $input .= '<option id="0"></option>';
                                                foreach ($Parroquias as $Parroquia) {
                                                    if ($Parroquia->getDescripcion() == $RIParroquia->getValor()) {
                                                       $input .= '<option id='.$Parroquia->getId().' selected>'.$Parroquia->getDescripcion().'</option>'; 
                                                    } else {
                                                       $input .= '<option id='.$Parroquia->getId().'>'.$Parroquia->getMunicipio().'</option>';
                                                    }
                                                }
                                                $input .= '</select></td></tr>';
                                                }
                                           if($OpcionRespuesta->getOpcion() == 'Municipio' ) {
                                               $Municipios = MunicipioQuery::create()->orderByMunicipio('asc')->find();
                                                $input  .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td>';
                                            //    $input  = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span>';
                                                $input .= '<td><select name='.$id_item.'[]'.' id='.$id_item.' class="municipio">';
                                                $input .= '<option id="0"></option>';
                                                foreach ($Municipios as $Municipio) {
                                                    if ($Municipio->getMunicipio() == $RIMunicipio->getValor()) {
                                                       $input .= '<option id='.$Municipio->getId().' selected>'.$Municipio->getMunicipio().'</option>'; 
                                                    } else {
                                                       $input .= '<option id='.$Municipio->getId().'>'.$Municipio->getMunicipio().'</option>';
                                                    }
                                                }
                                                $input .= '</select></td></tr>';
                                                }
                                           
                                           if($OpcionRespuesta->getOpcion() == 'Estado' ) {
                                               $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
                                                $input  .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td>';
                                            //    $input  = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span>';
                                                $input .= '<td><select name='.$id_item.'[]'.' id='.$id_item.' class="estado">';
                                                $input .= '<option id="0"></option>';
                                                foreach ($Estados as $Estado) {
                                                    if ($Estado->getNombre() == $RIEstado->getValor()) {
                                                       $input .= '<option id='.$Estado->getId().' selected>'.$Estado->getNombre().'</option>'; 
                                                    } else {
                                                       $input .= '<option id='.$Estado->getId().'>'.$Estado->getNombre().'</option>';
                                                    }
                                                }
                                                $input .= '</select></td></tr>';
                                                }
                                                
                                           if($OpcionRespuesta->getOpcion() == 'País' ) {
                                               $Paises = PaisQuery::create()->orderByNombre('asc')->find();
                                                $input .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td>';
                                                $input .= '<td><select name='.$id_item.'[]'.' id='.$id_item.' class="pais">';
                                                $input .= '<option id="0"></option>';
                                                foreach ($Paises as $Pais) {
                                                    if ($Pais->getNombre() == $RIPais->getValor()) {
                                                       $input .= '<option id='.$Pais->getId().' selected kkk>'.$Pais->getNombre().'</option>'; 
                                                    } else {
                                                       $input .= '<option id='.$Pais->getId().'>'.$Pais->getNombre().'</option>';
                                                    }
                                                }
                                                $input .= '</select></td></tr>';
                                                }
                                                
                                           
                                       }else{
                                            $input .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td><td><input name="'.$id_item.'[]"  id="'.$id_item.'" class="input_show_med" style=" text-transform:uppercase;"></td></tr>';
                                       }
                                       
                                       
                                       
                                   }
                               }
                               $post = $pre.$texto.$input.'</table></p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;                            
            
                            case 'F': //seleccion multiple con completacion caso otros especifique
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               $checked='';
                               $valor='';
                               if (count($OpcionRespuestas) > 0) {
                                   $checkbox = '';
                                   $i= 0;
                                   $j = 1;
                                   $count = count($OpcionRespuestas);                                   
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if ($id_opcion== $RI->getIdOpcion() ) $checked='checked';
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $valor= $RI->getValor();
                                           $checkbox .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input '.$checked.'name="'.$id_item.'otro"  value="'.$valor.'" class="input_show_med" style=" text-transform:uppercase;">';
                                           
                                       } else {
                                           $checkbox .= '<span style="padding-left:70px;"><b>'.$j.'. </b><input '.$checked.' style="padding-right: 30px;  text-transform:uppercase;" type="checkbox" name="'.$id_item.'[]"  value="'.$id_opcion.'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                       }
                                       $i++;
                                       $j++;
                                       $checked='';
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                           break;
                           
                           case 'G'://caso opcion multiple (pregunta 22 de visitante) debo usar varios RI porque todos tienen el mismo id item // si es expositor tiene otro valores
                                if ($tipo_encuesta=='Visitante'){
                                $RI1=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(137)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI2=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(138)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI3=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(139)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI4=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(140)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI5=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(141)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI6=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(142)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI7=RespuestaItemQuery::create()->filterByIdItem(44)->filterByIdOpcion(143)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                }else{
                                $RI1=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(177)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI2=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(178)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI3=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(179)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI4=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(180)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI5=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(181)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI6=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(182)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                $RI7=RespuestaItemQuery::create()->filterByIdItem(94)->filterByIdOpcion(183)->findOneByIdRespuestaEncuesta($id_respuesta_encuesta);
                                    
                                }
                                
                               $checked='';
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               $maximo = $Item->getMaximo()+1;
                               $tabla = '<center><table BORDER="1" CELLSPACING="0" width="70%" align="center"><tr><td width="60%">&nbsp;</td>';
                               for ($j = 1; $j <= $maximo; $j++) {
                                   if ($j < $maximo) {
                                        $tabla .= '<td><center>'.$j.'</center></td>';
                                   } else {
                                        $tabla .= '<td><center>N/S N/C</center></td></tr>';
                                        $tabla .= '<input type="hidden" value="" name="id_encuesta">';
                                   }
                               }
                               $tabla .= '</tr>';
                               
                               if (count($OpcionRespuestas) > 0) {
                                   $i= 0;
                                   $count = count($OpcionRespuestas);                                   
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       $comparar=$maximo;
                                       $tabla .= '<tr><td style="padding-left: 10px; padding-right:10px;  padding-top:10px;  padding-bottom:10px;" width="60%">'.$OpcionRespuesta->getOpcion().'</td>';
                                       if ($id_opcion== 137 || $id_opcion==177 and count($RI1)>0 ) $comparar=$RI1->getValor();
                                       if ($id_opcion== 138 || $id_opcion==178 and count($RI2)>0) $comparar=$RI2->getValor();
                                       if ($id_opcion== 139 || $id_opcion==179 and count($RI3)>0) $comparar=$RI3->getValor();
                                       if ($id_opcion== 140 || $id_opcion==180 and count($RI4)>0) $comparar=$RI4->getValor();
                                       if ($id_opcion== 141 || $id_opcion==181 and count($RI5)>0) $comparar=$RI5->getValor();
                                       if ($id_opcion== 142 || $id_opcion==182 and count($RI6)>0) $comparar=$RI6->getValor();
                                       if ($id_opcion== 143 || $id_opcion==183 and count($RI7)>0) $comparar=$RI7->getValor();
                                       for ($j = 1; $j <= $maximo; $j++) {
                                           if ($j == intval($comparar)) $checked='checked';
                                            if ($j < $maximo) {
                                                 $tabla .= '<td><center><input '.$checked.' type="radio" name="'.$id_item.'['.$id_opcion.']"  value="'. $j.'"/></center></td>';
                                            } else {
                                                 $tabla .= '<td><center><input '.$checked .' type="radio" name="'.$id_item.'['.$id_opcion.']"  value="'. '"NS/NC"/></center></td></tr>';
                                            }
                                            $checked='';
                                        }
                                       
                                   }
                               }
                               $post = $pre.$texto.$tabla.'</table></center></p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break; 
                           
                            case 'H': //completacion multiple solo vistante  item 6
                                    $valor=array();
                                $RITits=RespuestaItemQuery::create()->filterByIdItem(86)->filterByIdOpcion(171)->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->orderById('asc')->find();
                                $RIAus=RespuestaItemQuery::create()->filterByIdItem(86)->filterByIdOpcion(172)->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->orderById('asc')->find();
                                $RIGens=RespuestaItemQuery::create()->filterByIdItem(86)->filterByIdOpcion(173)->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->orderById('asc')->find();
                                $RICants=RespuestaItemQuery::create()->filterByIdItem(86)->filterByIdOpcion(174)->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->orderById('asc')->find();
                                $RIHs=RespuestaItemQuery::create()->filterByIdItem(86)->filterByIdRespuestaEncuesta($id_respuesta_encuesta)->orderById('asc')->find();
                                
                                foreach($RIHs as $RIH){
                                    array_push($valor,$RIH->getValor());
                                }
                                
                                $matriz[1][0]=$valor[0];
                                $matriz[1][1]=$valor[1];
                                $matriz[1][2]=$valor[2];
                                
                                $matriz[2][0]=$valor[3];
                                $matriz[2][1]=$valor[4];
                                $matriz[2][2]=$valor[5];
                                
                                $matriz[3][0]=$valor[6];
                                $matriz[3][1]=$valor[7];
                                $matriz[3][2]=$valor[8];
                                
                                $matriz[3][0]=$valor[9];
                                $matriz[3][1]=$valor[10];
                                $matriz[3][2]=$valor[11];
                               
                              //die(print_r($matriz));
                                
                                
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               $maximo = $Item->getMaximo()+1;
                               $maximo_col = count($OpcionRespuestas)+1;
                               $tabla = '<center><table style="table-layout: fixed;" BORDER="1" CELLSPACING="0" width="100%" align="center"><tr><td width="7%"><center>N°</center></td>';
                                if (count($OpcionRespuestas) > 0) {
                                    $m = 0;
                                    $respuesta = array();
                                    foreach($OpcionRespuestas as $OpcionRespuesta) {
                                        $respuesta[$m] = $OpcionRespuesta->getId();
                                        $id_opcion=$OpcionRespuesta->getId();
                                        $tabla .= '<td><center>'.$OpcionRespuesta->getOpcion().'</center></td>';
                                        $m++;  
                                    }
                                    $m=0;
                                    $tabla .= '</tr>';
                                }
                                for ($j = 0; $j < $maximo-1; $j++) {
                                    for ($i = 0; $i < $maximo_col; $i++) {
                                        if ($i == 0) {
                                             $columna = $j+1;
                                             $tabla .= '<tr><td width="7%"><center>'.$columna.'</center></td>';
                                        } else {
                                             $k = $i-1;
                                             $tabla .= '<td><center><input style="text-transform:uppercase;" type="text" value="'.$matriz[$i][$j].'" name="'.$id_item.'['.$respuesta[$k].']['.$j.']" /></center></td>';
                                             $m++;
                                        }  
                                   }       
                                   $tabla .= '</tr>';
                               }
                               $post = $pre.$texto.$tabla.'</table></center></p>';
                               echo $post;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;
                           case 'I':
                               $Paises = PaisQuery::create()->orderByNombre('asc')->find();
                               $select_pais = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>País</b>:</span>';
                               $select_pais .= '<select id="pais" name="pais" class="pais">';
                               foreach ($Paises as $Pais) {
                                   if ($Pais->getNombre() == 'Venezuela') {
                                      $select_pais .= '<option id='.$Pais->getId().' selected>'.$Pais->getNombre().'</option>'; 
                                   } else {
                                      $select_pais .= '<option id='.$Pais->getId().'>'.$Pais->getNombre().'</option>';
                                   }
                               }
                               $select_pais .= '</select>';
                               echo $select_pais;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;
                           case 'J':
                               $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
                               $select_estado = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span>';
                               $select_estado .= '<select id="estado" name="estado" class="estado">';
                               $select_estado .= '<option id="0"></option>';
                               foreach ($Estados as $Estado) {
                                   if ($Estado->getNombre() == 'Distrito Capital') {
                                      $select_estado .= '<option id='.$Estado->getId().' selected>'.$Estado->getNombre().'</option>'; 
                                   } else {
                                      $select_estado .= '<option id='.$Estado->getId().'>'.$Estado->getNombre().'</option>';
                                   }
                               }
                               $select_estado .= '</select>';
                               echo $select_estado;
                               echo '<a href="#" class="salva" id="'.$Item->getId() .'" > <img src="/images/check-icon.png"> </a></p>';
                           break;                             
                            
                           
                        }
                    }
                }
              
            
            ?>
            
        </td>
    </tr>
    <tr>
        <td style="padding-left: 50px;">
            Observaciones:
            <p style="padding-left:75px;"><textarea name="observaciones" value="<?php echo $observacion?>"class="textareashow"></textarea></p>
            <table>
                <tr>
                    <td><span>Nombre y apellido del encuestado: </span></td><td><input name="nombre_apellido" value="<?php echo $nombre.' '.$apellido?>" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>N° teléfono de contacto: </span></td><td><input name="telefono" value="<?php echo $telefono?>" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>Correo electrónico: </span></td><td><input name="correo" value="<?php echo $email?>" class="input_show_med"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php // echo link_to(image_tag('list.png'),'encuesta/index',array('title' => 'Ver listado'))?>
<?php // echo link_to(image_tag('edit.png'),'encuesta/edit?id='.$Encuesta->getId(),array('title' => 'Editar'))?>
<?php // echo link_to(image_tag('delete.png'), 'encuesta/delete?id='.$Encuesta->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eliminar?')) ?>
</p>


<script>
    
    $(document).ready(function(){
        $("a.salva").click(function(){
            $.post( "actualizaencuesta", { id_item: this.id , 
                                           valor:$("input[name*='"+this.id+ "']").val(), 
                                            tipo_encuesta: $("#encuesta_tipo_encuesta").val() , 
                                            id_feria: $("#encuesta_id_feria").val(), 
                                            nro_encuesta: $("#nro_encuesta").val() 
                                       })
             .done(function( data ) {
                alert( "Resultado: " + data );
            });
                
        });

} );
</script>
