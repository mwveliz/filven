<? $nueva=true;?>
<form action="<?php echo url_for('respuesta_encuesta/create?id_encuesta='.$id_encuesta) ?> " method="post">
<input type="hidden" value="<?echo $id_encuesta?>" name="id_encuesta">
<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
   <tr>
        <td colspan="1"> Numero de Encuesta:</td><td><input type="text" size="5" name="numero_encuesta"/></td>
   </tr>     
   <tr>
       <td></td>
        <td> Nombre:<input type="text" name="nombre"/></td>
        <td colspan="1"> Apellido:<input type="text" name="apellido"/>
        </td>
         <td colspan="1"> Teléfono:<input type="text" name="telefono"/></td>
        
  </tr>      
  <tr>
      <td></td>
        
      <td colspan="1"> Fecha:<input type="date" name="fecha"/></td>
        <td colspan="1"> Hora:<input type="time" name="hora"/> </td>
        <td colspan="1"> email:<input type="text" name="email"/></td>
</tr>
   <tr>
       
<br>
<br><br>
        <td> Observación:</td><td><input type="textarea" name="observacion"/></td>
   </tr>     



<?php foreach ($Items as $Item): ?>
<tr>
  <td>
      <?php 
      $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
      $cantidad_opciones=count($OpcionRespuestas);
      $tipo_item=$Item->getTipoItem();
      $id_item=$Item->getId();
      echo $Item->getNumeracion() .'. ' . $Item->getTexto().'</td><td>' ;
      if ($tipo_item=='A'){
          echo "   <input type='text' name='". $id_item. "' id='". $id_item." '/>";
      }
      
      if ($tipo_item=='G') {
          $max_escala=$Item->getMaximo();
          for ($i=1; $i<=$max_escala; $i++) {
                echo $i."</td><td>";
                }
                echo "NS/NC";
                //agrego un input oculto con el id_item
                echo '<input type="hidden" value="" name="id_encuesta">';
      }
    
      if ($tipo_item=='H') {
          $max_sub=$Item->getMaximo();
          for ($i=1; $i<=$max_sub; $i++) {
                echo $i."</td><td>";
                }
      }
    $i=0;
      ?>
   </td></tr>
    <tr><td>
    <?php foreach ($OpcionRespuestas as $OpcionRespuesta): ?>
    <?php $i++;
    $id_opcion=$OpcionRespuesta->getId();
    switch($tipo_item) {
       case "B"://seleccion simple
           echo "<input type='radio' name='".$id_item."[]'  value='".$id_opcion."'/> ". $OpcionRespuesta->getOpcion();
        break;
       case "C"://seleccion con completacion
           echo "<input type='radio' name='".$id_item."[]'  value='".$id_opcion."'/> ". $OpcionRespuesta->getOpcion();
           if ($i==$cantidad_opciones){
               echo "<input type='text' name='".$id_item."otro'  value=''/> ";
           }
        break;
        case "D"://seleccion multilpe
           echo "<input type='checkbox' name='".$id_item."[]' value='".$id_opcion."'/> ". $OpcionRespuesta->getOpcion();
        break;

        case "E"://completacion multiple
               echo $OpcionRespuesta->getOpcion() .": <input type='text' name='".$id_item."[]'  id='".$id_item."'/> ";
           
        break;
       case "F"://seleccion multiple con completacion
           echo "<input type='checkbox' name='".$id_item."[]'  value='".$id_opcion."'/> ". $OpcionRespuesta->getOpcion();
           if ($i==$cantidad_opciones){
               echo "<input type='text' name='".$id_item."otro'  value=''/> ";
           }
        break;
        case "G"://seleccion multiple con valores
            echo $OpcionRespuesta->getOpcion()."</td><td>";
              for ($i=1; $i<=$max_escala; $i++) {
                echo "<input type='radio' name='".$id_item."[".$id_opcion."]'  value='". $i."'/> </td><td>";
                }
                echo "<input type='radio' name='".$id_item."[".$id_opcion."]'  value='". "'NS/NC'/></td></tr><tr><td> ";
        break;
        case "H"://seleccion multiple con valores
            echo $OpcionRespuesta->getOpcion();
            for ($i=0; $i<$max_sub; $i++) {
                 echo "</td><td><input type='text'name='".$id_item."[".$id_opcion."][".$i."]' /></td><td>";
                }
                echo "</td></tr><tr><td> ";
        break;  
    }
            ?>
        <?php endforeach;?>
    </td></tr>
<?php endforeach;?>
    
  </tbody>   
<tfoot>
    
        <td>
            <input id="guardar_submit" type="submit" value="Guardar" />
        </td>
        
        
        <td>
            <input id="cancelar_submit" type="submit" value="Cancelar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>