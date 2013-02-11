<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php
//actualizo el id_item por si hay alguna falla
$numeracion=1;
$id_encuesta=$sf_params->get('id_encuesta');
$I=  ItemQuery::create()->filterByIdEncuesta($id_encuesta)->orderById('desc')->findOne();
if (count($I)>0) $numeracion=$I->getNumeracion()+1;

?>
<form action="<?php echo url_for('item/createvarios?id_encuesta='.$id_encuesta) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="tablas">
    <tfoot>
        <tr style="display:none" id="tr_mas">
            <td id="mas"> <a href="#"> <?php echo image_tag('agregar.png')?> </a></td>
          </tr>  
      <tr>
        <td>
            <input id="anterior_submit" type="submit" value="Anterior Item" />
        </td>
        
        <td>
            <input id="fin_submit" type="submit" value="Finalizar Encuesta" />
        </td>
        
        
        <td>
            <input id="siguiente_submit" type="submit" value="Siguente Item" />
        </td>
        
      </tr>
      
    </tfoot>
    <tbody>
        <tr>
    <th><label for="item_identificador_item">Numeración item</label></th>
    <td><input type="text" name="numeracion"  id="numeracion" value="<?php echo $numeracion?>"/></input>
      </tr>
      <tr>  
      <th><label for="item_texto">Texto</label></th>
        <td><input type="textarea" name="texto" id="texto" /></td>
        </tr>
    <tr>
        <th><label for="tipo_item">Tipo Item</label></th>
        <td><select id="tipo_item" class="tipo_item"  type="checkbox" name="tipo_item" />
            <option id="A" value="A"> Tipo A (Completación) </option>
            <option id="B" value="B"> Tipo B (Selección Simple)</option>
            <option id="C" value="C"> Tipo C (Selección Simple con Completación)</option>
            <option id="D" value="D"> Tipo D (Selección Múltiple)</option>
            <option id="E" value="E"> Tipo E (Completación Multiple)</option>
            <option id="F" value="F"> Tipo F (Selección Múltiple con Completación)</option>
            <option id="G" value="G"> Tipo G (Seleccion Multiple Segundo Nivel)</option>
            <option id="H" value="H"> Tipo H (Completación Multiple Segundo Nivel)</option>
        </select>
        </td>
    </tr>
    
    
    <tr class="tr_ocultable" tipo="B" style="display:none" id="1">
        <td id="1" >
            <input type="radio" name="opcion[]" id="B" checked>
                <input type="text" id="opcion" class="B" />
                </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>    
    </tr>   
    
  
     <tr class="tr_ocultable" tipo="C" style="display:none" id="1">
        <td id="1" >
            <input type="radio" name="opcion[]" id="C" checked>
                <input type="text" id="opcion" class="C"/>
                </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>    
         
    </tr>  
    
    
    <tr class="tr_ocultable" tipo="D" style="display:none" id="1">
        <td id="1" >
            <input type="checkbox" name="opcion[]" id="D" checked="checked">
                    <input type="text" id="opcion" class="D"/>
                </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>    
    </tr>      
    <tr class="tr_ocultable" tipo="E" style="display:none" id="1">
        <td id="1" >
            <input type="checkbox" name="opcion[]" id="E" checked="checked">
                <input type="text" id="opcion" class="E"/>_____________
                </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>    
    </tr>      
    
    <tr class="tr_ocultable" tipo="F" style="display:none" id="1">
        <td id="1" >
            <input type="checkbox" name="opcion[]" id="F" checked="checked">
                <input type="text" id="opcion" class="F"/>
                </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>  
    </tr>      
    
    <tr class="tr_ocultable" tipo="G" style="display:none" id="1">
        <td id="max_escala">
            Escala Max: <select id="max_escala">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
        </td>
        
        <td id="1" colspan="2" >
            <input type="checkbox" name="opcion[]" id="G" checked="checked" id="1">
               <input type="text" id="opcion" class="G"/>
               </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>
        
    </tr>      
    <tr class="tr_ocultable" tipo="H" style="display:none" id="1">
         <td id="max_sub">
            Numero de sub items: <select id="max_sub">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
        </td>
        <td id="1" colspan="2" >
            <input type="checkbox" name="opcion[]" id="H" checked="checked" id="1">
               <input type="text" id="opcion" class="H"/>
               </input>
        </td>
        <td id="mas">
            <a href="#">+</a>
        </td>
     </tr>      
    </tbody>
  </table>
</form>


<script>
    function getidencuesta() {
    var searchString = window.document.URL.toString(); 
      params = searchString.split("/");
      longitud=params.length;
      id_encuesta=(params[longitud-1]);
      id_encuesta=id_encuesta.replace('#', "");

      return id_encuesta
    }
    
    
$(document).ready(function(){
    


  $(document).on("click","td#mas", function(){
        $(this).parent().clone().appendTo('table.tablas');
        $('tr:last').attr("param","clonado" );
        $('input#opcion:last').val("");
        /*var indice=$('tr.tr_ocultable:last').index()-9;
        indice++;*/
        $(this).toggle();
        /*$('tr.tr_ocultable:last').attr('id',indice);
        */
        $('td#max_escala').not('td#max_escala:first').remove();
        $('td#max_sub').not('td#max_sub:first').remove();
  });
  

    $(document).on("click", "select.tipo_item", function(){
     var valor=$(this).val(); 
     
     //segun el valor escogido activo una u otra interfaz
     $('tr.tr_ocultable').css('display','none');
     $('tr[tipo="'+valor+'"]').toggle();
     
     
     
     
});


//ajax Botones
$('input#siguiente_submit').click(function (e){
    e.preventDefault();
    var numeracion=$('input#numeracion').val();
    var texto=$('input#texto').val();
    var opcion=new Array;
    var i=0;
    var valor='';
    var tipo_item=$('select#tipo_item').val();
    alert(tipo_item);
    
    var max_escala=$('select#max_escala').val();
    var max_sub=$('select#max_sub').val();
    var id_encuesta=getidencuesta(); 
    var max=0;
    if(tipo_item=='G') max=max_escala;
    if(tipo_item=='H') max=max_sub;
    
    
    $('input[class="'+tipo_item+'"]').each(function(){
       valor=$(this).val() ;
       opcion[i]=valor;
       i++;
    });
    
    
    
    $.ajax({ type: "POST",
	    	url: "<?php echo url_for('item/createvarios'); ?>",
                data: "numeracion=" + numeracion + "&id_encuesta="+id_encuesta
                +"&texto=" + texto+"&tipo_item="+ tipo_item+"&max="+max+"&opcion="+JSON.stringify(opcion),

	    	success: function(message){
                    $('tr[param="clonado"]').remove();
                    $('td#mas').css('display','inline');
                    
                    $('input#opcion').val("");
                    numeracion++;
                  $('input#numeracion').val("");
                  $('input#numeracion').val(numeracion);
                  $('input#texto').val("");
                  $('select#tipo_item').val('A').trigger('change');
                  $('select#tipo_item').trigger('click');
                  
                  
                 }
	    });
    
});

});

</script>
    