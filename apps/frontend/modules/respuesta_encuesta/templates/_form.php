<? $nueva=true;?>
<script>
jQuery(document).ready(function() {    
    $(document).on("change","select.pais", function(){
            var pais = $(this).children(":selected").val();
            if (pais != 'Venezuela') {
                $(".estado option#0").attr("selected",true);
                $('.estado').attr('disabled','disabled');
            } else {
                $('.estado').removeAttr('disabled');
            }            
    });
});    
</script>
<form action="<?php echo url_for('respuesta_encuesta/create?id_encuesta='.$id_encuesta) ?> " method="post">
<input type="hidden" value="<?echo $id_encuesta?>" name="id_encuesta">
<table class="show_encuesta">
    <tr>
        <td>
            <? $Encuesta = EncuestaQuery::create()->filterById($sf_params->get('id_encuesta'))->findOne(); 
            ?>
            <table class="show_interna_encuesta">
                <tr>
                    <td style="padding-left: 50px;">
                       <p style="vertical-align: middle;"><? echo image_tag('logo_mini.jpg')  ?> </p> 
                    </td>
                    <td>
                        <p style="vertical-align: middle;"><b>Encuesta para <? echo $Encuesta->getTipoEncuesta()?></b></p>
                    </td>
                    <td>
                        <p style="vertical-align: middle;"><span style="padding-left: 10px;">Fecha: </span><input type="date" name="fecha"/><span style="padding-left: 10px;">Hora: </span><input type="time" name="hora"/></p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 50px;">
                       <p style="vertical-align: middle;">&nbsp;</p> 
                    </td>
                    <td>
                       <p style="vertical-align: middle;">&nbsp;</p> 
                    </td>                    
                    <td>
                        <p style="vertical-align: middle;"><span style="padding-left: 10px;">N° de encuesta: </span><input name="numero_encuesta" class="input_show_min"></p>
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
            <?php foreach ($Items as $Item): ?>
                <?php 
                   $id_item=$Item->getId();           
                   $caso = $Item->getTipoItem();
                   switch ($caso) {  
                           case 'A':
                               echo '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><input type="text" name="'. $id_item. '" id="'. $id_item.'" class="input_show_med" style=" text-transform:uppercase;"/>';
                           break;
                       
                           case 'B':
                               $pre = '<br><p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       $radio .= '<input style="padding-right: 30px; text-transform:uppercase;" type="radio" name="'.$id_item.'[]"  value="'.$id_opcion.'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';
                                   }
                               }
                               $post = $pre.$texto.$radio.'</span></p>';
                               echo $post;
                           break;
                           
                             case 'C':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   $i= 0;
                                   $count = count($OpcionRespuestas);
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $radio .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input name="'.$id_item.'otro"  value="" class="input_show_med" style=" text-transform:uppercase;">';
                                       } else {
                                           $radio .= '<input style="padding-right: 30px; " type="radio" name="'.$id_item.'[]"  value="'.$id_opcion.'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';  
                                       }
                                       $i++;
                                   }
                               }
                               $post = $pre.$texto.$radio.'<span></p>';
                               echo $post;
                           break;  
                           
                           case 'D':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $i = 1;
                                   $checkbox = '';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       $checkbox .= '<span style="padding-left:70px;"><b>'.$i.'. </b><input style="padding-right: 30px;  text-transform:uppercase;" type="checkbox" name="'.$id_item.'[]" value="'.$id_opcion.'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                       $i++;
                                       
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                           break; 
                           
                           case 'E':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $input = '<table>';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       
                                       if ($OpcionRespuesta->getOpcion() == 'Estado' || $OpcionRespuesta->getOpcion() == 'País' ){
                                           if($OpcionRespuesta->getOpcion() == 'Estado' ) {
                                               $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
                                                $input  .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td>';
                                            //    $input  = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span>';
                                                $input .= '<td><select name='.$id_item.'[]'.' id='.$id_item.' class="estado">';
                                                $input .= '<option id="0"></option>';
                                                foreach ($Estados as $Estado) {
                                                    if ($Estado->getNombre() == 'Distrito Capital') {
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
                                                    if ($Pais->getNombre() == 'Venezuela') {
                                                       $input .= '<option id='.$Pais->getId().' selected>'.$Pais->getNombre().'</option>'; 
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
                           break;                            
            
                          case 'F':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->orderById('asc')->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $checkbox = '';
                                   $i= 0;
                                   $j = 1;
                                   $count = count($OpcionRespuestas);                                   
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $id_opcion=$OpcionRespuesta->getId();
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $checkbox .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input name="'.$id_item.'otro"  value="" class="input_show_med" style=" text-transform:uppercase;">';
                                       } else {
                                           $checkbox .= '<span style="padding-left:70px;"><b>'.$j.'. </b><input style="padding-right: 30px;  text-transform:uppercase;" type="checkbox" name="'.$id_item.'[]"  value="'.$id_opcion.'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                       }
                                       $i++;
                                       $j++;
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                           break;
                           
                           case 'G':
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
                                       $tabla .= '<tr><td style="padding-left: 10px; padding-right:10px;  padding-top:10px;  padding-bottom:10px;" width="60%">'.$OpcionRespuesta->getOpcion().'</td>';
                                       for ($j = 1; $j <= $maximo; $j++) {
                                            if ($j < $maximo) {
                                                 $tabla .= '<td><center><input type="radio" name="'.$id_item.'['.$id_opcion.']"  value="'. $j.'"/></center></td>';
                                            } else {
                                                 $tabla .= '<td><center><input type="radio" name="'.$id_item.'['.$id_opcion.']"  value="'. '"NS/NC"/></center></td></tr>';
                                            }
                                        }                                       
                                   }
                               }
                               $post = $pre.$texto.$tabla.'</table></center></p>';
                               echo $post;
                           break; 
                           
                            case 'H':
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
                                    $tabla .= '</tr>';
                                }
                                for ($j = 0; $j < $maximo-1; $j++) {
                                   for ($i = 0; $i < $maximo_col; $i++) {
                                        if ($i == 0) {
                                             $columna = $j+1;
                                             $tabla .= '<tr><td width="7%"><center>'.$columna.'</center></td>';
                                        } else {
                                             $k = $i-1;
                                             $tabla .= '<td><center><input style="text-transform:uppercase;" type="text" name="'.$id_item.'['.$respuesta[$k].']['.$j.']" /></center></td>';
                                        }  
                                   }       
                                   $tabla .= '</tr>';
                               }
                               $post = $pre.$texto.$tabla.'</table></center></p>';
                               echo $post;
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
                           break;                             
                   } 
                 ?>
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 50px;">
            Observaciones:
            <p style="padding-left:75px;"><textarea name="observacion" class="textareashow"></textarea></p>
            <table>
                <tr>
                    <td><span>Nombre: </span></td><td><input name="nombre" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>Apellido: </span></td><td><input name="apellido" class="input_show_med"></td>
                </tr>                
                <tr>
                    <td><span>N° teléfono de contacto: </span></td><td><input name="telefono" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>Correo electrónico: </span></td><td><input name="email" class="input_show_med"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<br>
<center>
<table align="center">
    <tr>
        <td>
            <input id="guardar_submit" class="button" type="submit" value="Guardar" />
        </td>
        <td>
            <input id="cancelar_submit" class="button" type="submit" value="Cancelar" />
        </td>       
    </tr>
</table>
</center>
<br>
<br>
</form>