
<table>
   <tr><td> Nombre:</td>
<td><input type="text" name="Nombre"/></td>
</tr>
<tr><td> Apellido:</td>
<td><input type="text" name="Apellido"/></td>
</tr>
<tr><td> Fecha:</td>
<td><input type="date" name="Fecha"/></td>
</tr>
<tr><td> Hora:</td>
<td><input type="time" name="Fecha"/></td>
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
          
      $i=0;
      
      
      ?>
   <td></tr>
    <tr><td>
    <?php foreach ($OpcionRespuestas as $OpcionRespuesta): ?>
    <?php $i++;
    $id_opcion=$OpcionRespuesta->getId();
    
    ?>   
    <?php switch($tipo_item) {
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

