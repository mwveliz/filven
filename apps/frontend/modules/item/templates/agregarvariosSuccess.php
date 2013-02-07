<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>





<form action="<?php echo url_for('item/createvarios?id_encuesta='.$id_encuesta) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="tabla_usuario">
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
    <th><label for="item_identificador_item">Identificador item</label></th>
    <td><input type="text" name="identificador_item[]"  id="item_identificador_item" /><input type="hidden" name="item[id]" id="item_id" />
      </tr>
      <tr>  
      <th><label for="item_texto">Texto</label></th>
        <td><input type="textarea" name="item_texto[]" id="item_texto" /></td>
        </tr>
    <tr>
        <th><label for="item_completacion">De Completación</label></th>
        <td><input id="1" class="input_switch"  type="checkbox" name="item_completacion[]" checked="checked" id="item_completacion" /></td>
    </tr>
    
    <tr class="tr_ocultable" style="display:none">
        <td id="1" >Simple: <input class="switch_opcion_respuesta" type="checkbox" name="item_seleccion_simple[]" checked="checked" id="item_seleccion_simple" />
            </td>
    </tr>           
    <tr class="tr_ocultable" style="display:none">
        <td id="1" >Multivalor: <input class="switch_valor_opcion" type="checkbox" name="item_seleccion_simple[]"  id="item_seleccion_simple" />
            </td>
    </tr>           
    
    
    
    <tr id="1" class="tr_ocultable" style="display:none">
          <td colspan="2">
          <br><input id="opcion" name="opcion[]" type="radio"> Opción: <input type="text" name="opcion_respuesta"/> 
          <br>Valor: <input id="valor" name="valor[]" type="text" name="valor_opcion"/></td>
     </tr>     
        
    </tbody>
  </table>
</form>


<script>
    
$(document).ready(function(){
    


  $('#mas').click(function(){
      $('tr:last').clone().appendTo('table.tabla_usuario');
      var indice=$('tr:last').index() -3;
      $('tr:last').attr('id', indice);
      
  });
  

$(document).on("click", "input.input_switch", function(){
     var indice=$(this).parent().next('td').attr('id'); 
     
     //$(this).parent().parent().next('tr').toggle();
     $('tr.tr_ocultable').toggle();
     $('#tr_mas').toggle();
     
});


$(document).on("click", "input.switch_opcion_respuesta", function(){
    if ($(this).is(':checked')) {
    $('input#opcion').attr("type","radio");
    }else{
    $('input#opcion').attr("type","checkbox");
    }
    
    
});
$(document).on("click", "input.switch_valor_opcion", function(){
    if ($(this).is(':checked')) {
    $('input#valor').attr("type","radio");
    $('input#valor').after('<span id="valor_span"> <input type="text"/>+ <br></span>');
    }else{
   $('span#valor_span').remove();
   $('input#valor').attr("type","text");
    }
});


$(document).on("click", "span#valor_span", function(){
    $(this).after('<span id="valor_span"><input type="text"/>+ <br></span>');

})


//ajax Botones
$('input#siguiente_submit').click(function (){
    
});

});

</script>
    