<h1> LLenado de Encuesta</h1>
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
       
        <td></td>
        <td></td><td colspan="1"> Nombre:</td>
        <td><input type="text" name="Nombre"/></td>
        <td colspan="1"> Apellido:</td>
        <td colspan="1">
        <input type="text" name="Apellido"/>
        </td>
        <td></td>
        <td></td>
  </tr>      
  <tr>
      <td></td>
        <td></td>
      <td colspan="1"> Fecha:</td>
        <td colspan="1">
        <input type="date" name="Fecha"/>
        <td colspan="1"> Hora:</td>
        <td colspan="1">
        <input type="time" name="Fecha"/>
        </td>
        <td></td>
        <td></td>

</tr>



<?php foreach ($Items as $Item): ?>
<tr>
  <td>
      <?php 
      $OpcionRespuestas = OpcionRespuestaQuery::create()->filterByIdItem($Item->getId())->find();
      $cantidad_opciones=count($OpcionRespuestas);
      $tipo_item=$Item->getTipoItem();
      $id_item=$Item->getId();
      echo $Item->getNumeracion() .'. ' . $Item->getTexto();
      if ($tipo_item=='A'){
          echo "   <input type='text' name='". $id_item. "' id='". $id_item." '/>";
      }
      
      if ($tipo_item=='G') {
          $max_escala=$Item->getMaximo();
          for ($i=1; $i<=$max_escala; $i++) {
                echo $i."</td><td>";
                }
                echo "NS/NC";
      }

      if ($tipo_item=='H') $max_sub=$Item->getMaximo();   
      
          
      $i=0;
      
      
      ?>
   </td></tr>
    <tr><td>
    <?php foreach ($OpcionRespuestas as $OpcionRespuesta): ?>
    <?php $i++;
    $id_opcion=$OpcionRespuesta->getId();
    switch($tipo_item) {
       case "B"://seleccion simple
           echo "<input type='radio' name='".$id_item."[]'  id='".$id_item."'/> ". $OpcionRespuesta->getOpcion();
        break;
       case "C"://seleccion con completacion
           echo "<input type='radio' name='".$id_item."[]'  id='".$id_item."'/> ". $OpcionRespuesta->getOpcion();
           if ($i==$cantidad_opciones){
               echo "<input type='text' name='".$id_item."'  id='".$id_item."'/> ";
           }
        break;
        case "D"://seleccion multilpe
           echo "<input type='checkbox' name='".$id_item."[]'  id='".$id_item."'/> ". $OpcionRespuesta->getOpcion();
        break;

        case "E"://completacion multiple
               echo $OpcionRespuesta->getOpcion() .": <input type='text' name='".$id_opcion."'  id='".$id_item."'/> ";
           
        break;
       case "F"://seleccion multiple con completacion
           echo "<input type='checkbox' name='".$id_item."[]'  id='".$id_item."'/> ". $OpcionRespuesta->getOpcion();
           if ($i==$cantidad_opciones){
               echo "<input type='text' name='".$id_item."'  id='".$id_item."'/> ";
           }
        break;
        case "G"://seleccion multiple con valores
            echo $OpcionRespuesta->getOpcion()."</td><td>";
              for ($i=1; $i<=$max_escala; $i++) {
                echo "<input type='radio' name='".$id_item."[]'  id='".$id_item."'/> </td><td>";
                }
                echo "<input type='radio' name='".$id_item."[]'  id='".$id_item."'/></td></tr><tr><td> ";
      
            
        break;
        case "H"://seleccion multiple con valores
            for ($i; $i<$max_sub; $i++) {
                echo "</td><td> ".$OpcionRespuesta->getOpcion(). "<input type='text'/>";
            
                }
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

