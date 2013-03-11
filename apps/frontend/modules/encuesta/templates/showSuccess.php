<table class="show_encuesta">
    <tr>
        <td>
            <table class="show_interna_encuesta">
                <tr>
                    <td style="padding-left: 50px;">
                       <p style="vertical-align: middle;"><? echo image_tag('logo_mini.jpg')  ?> </p> 
                    </td>
                    <td>
                        <p style="vertical-align: middle;"><b>Encuesta para <? echo $Encuesta->getTipoEncuesta()?></b></p>
                    </td>
                    <td>
                        <p style="vertical-align: middle;"><span style="padding-left: 10px;">Fecha: </span><input name="fecha" class="input_show_min"><span style="padding-left: 10px;">Hora: </span><input name="hora" class="input_show_min"><span style="padding-left: 10px;">N° de encuesta: </span><input name="numero_encuesta" class="input_show_min"></p>
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
            <? $Items = ItemQuery::create()->filterByIdEncuesta($Encuesta->getId())->orderByNumeracion('asc')->find(); 
                if (count($Items) > 0) {
                    foreach ($Items as $Item) {
                        $caso = $Item->getTipoItem();
                        switch ($caso) {
                            case 'A':
                               echo '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><input name="'.$Item->getId().'" class="input_show_med">';
                           break;

                           case 'B':
                               $pre = '<br><p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $radio .= '<input style="padding-right: 30px;" type="radio" name="'.$Item->getId().'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';
                                   }
                               }
                               $post = $pre.$texto.$radio.'</span></p>';
                               echo $post;
                           break; 
                           
                           case 'C':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $radio = '<span style="padding-left:70px;">';
                                   $i= 0;
                                   $count = count($OpcionRespuestas);
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $radio .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input name="'.$Item->getId().'" class="input_show_med">';
                                       } else {
                                           $radio .= '<input style="padding-right: 30px; " type="radio" name="'.$Item->getId().'"><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span>';  
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
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $checkbox = '';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $checkbox .= '<span style="padding-left:70px;"><input style="padding-right: 30px;" type="checkbox" name="'.$OpcionRespuesta->getId().'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                           break;   

                           case 'E':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $input = '<table>';
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $input .= '<tr><td><span style="padding-left:70px;">'.$OpcionRespuesta->getOpcion().': </span></td><td><input name="'.$OpcionRespuesta->getId().'" class="input_show_med"></td></tr>';
                                   }
                               }
                               $post = $pre.$texto.$input.'</table></p>';
                               echo $post;
                           break;   
                           
                           case 'F':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               if (count($OpcionRespuestas) > 0) {
                                   $checkbox = '';
                                   $i= 0;
                                   $count = count($OpcionRespuestas);                                   
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       if (count($OpcionRespuestas)-1 == $i) {
                                           $checkbox .= '<br><br><span style="padding-left: 70px; padding-right:10px;">'.$OpcionRespuesta->getOpcion().':</span><input name="'.$Item->getId().'" class="input_show_med">';
                                       } else {
                                           $checkbox .= '<span style="padding-left:70px;"><input style="padding-right: 30px;" type="checkbox" name="'.$OpcionRespuesta->getId().'"></span><span style="padding-right: 30px; padding-left:10px;">'.$OpcionRespuesta->getOpcion().'</span><br>';
                                       }
                                       $i++;                                      
                                   }
                               }
                               $post = $pre.$texto.$checkbox.'</p>';
                               echo $post;
                           break;                            
                           
                            case 'G':
                               $pre = '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;">';
                               $texto = '<span style="padding-left: 50px; padding-right:20px;"><b>'.$Item->getNumeracion().'.</b>  '.$Item->getTexto().':</span><br><br>';
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               $maximo = $Item->getMaximo()+1;
                               $tabla = '<center><table BORDER="1" CELLSPACING="0" width="70%" align="center"><tr><td width="60%">&nbsp;</td>';
                               for ($j = 1; $j <= $maximo; $j++) {
                                   if ($j < $maximo) {
                                        $tabla .= '<td><center>'.$j.'</center></td>';
                                   } else {
                                        $tabla .= '<td><center>N/S N/C</center></td></tr>';
                                   }
                               }
                               $tabla .= '</tr>';
                               if (count($OpcionRespuestas) > 0) {
                                   $i= 0;
                                   $count = count($OpcionRespuestas);                                   
                                   foreach($OpcionRespuestas as $OpcionRespuesta) {
                                       $tabla .= '<tr><td style="padding-left: 10px; padding-right:10px;  padding-top:10px;  padding-bottom:10px;" width="60%">'.$OpcionRespuesta->getOpcion().'</td>';
                                       for ($j = 1; $j <= $maximo; $j++) {
                                            if ($j < $maximo) {
                                                 $tabla .= '<td><center>&nbsp;</center></td>';
                                            } else {
                                                 $tabla .= '<td><center>&nbsp;</center></td></tr>';
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
                               $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
                               $maximo = $Item->getMaximo()+1;
                               $maximo_col = count($OpcionRespuestas)+1;
                               $tabla = '<center><table style="table-layout: fixed;" BORDER="1" CELLSPACING="0" width="70%" align="center"><tr><td><center>N°</center></td>';
                                if (count($OpcionRespuestas) > 0) {
                                    foreach($OpcionRespuestas as $OpcionRespuesta) {
                                        $tabla .= '<td><center>'.$OpcionRespuesta->getOpcion().'</center></td>';
                                    }
                                    $tabla .= '</tr>';
                                }
                               for ($j = 1; $j <= $maximo; $j++) {
                                   for ($i = 1; $i <= $maximo_col; $i++) {
                                        if ($i == 1) {
                                             $tabla .= '<tr><td><center>'.$j.'</center></td>';
                                        } else {
                                             $tabla .= '<td><center>&nbsp;</center></td>';
                                        }  
                                   }       
                                   $tabla .= '</tr>';
                               }
                               $post = $pre.$texto.$tabla.'</table></center></p>';
                               echo $post;
                           break; 
                           
                           case 'I':
                               echo '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>País</b>:</span><input name="pais" class="input_show_med">';
                           break; 
                       
                           case 'J':
                               echo '<p style="vertical-align: middle; padding-top:10px; padding-bottom:10px;"><span style="padding-left: 50px; padding-right:10px;"><b>Estado</b>:</span><input name="estado" class="input_show_med">';
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
            <p style="padding-left:75px;"><textarea name="observaciones" class="textareashow"></textarea></p>
            <table>
                <tr>
                    <td><span>Nombre y apellido del encuestado: </span></td><td><input name="nombre_apellido" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>N° teléfono de contacto: </span></td><td><input name="telefono" class="input_show_med"></td>
                </tr>
                <tr>
                    <td><span>Correo electrónico: </span></td><td><input name="correo" class="input_show_med"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>
<br>
<p style="text-align: right; padding-right: 50px; margin-left: 50px; padding-top: 10px; border-top: 1px solid black;">
<?php echo link_to(image_tag('list.png'),'encuesta/index',array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),'encuesta/edit?id='.$Encuesta->getId(),array('title' => 'Editar'))?>
<?php // echo link_to(image_tag('delete.png'), 'encuesta/delete?id='.$Encuesta->getId(), array('method' => 'delete', 'confirm' => 'Seguro desea eliminar?')) ?>
</p>


