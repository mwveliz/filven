<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="encuesta/buscaymodifica" method="post" >

<div class="field">
	<label for="name">Tipo de encuesta:</label>
         <span class="select"><?php echo $form['tipo_encuesta']->render(array('class' => 'select')) ;?>
             <p class="hint">Introduzca el tipo de encuesta</p>
             </div>
    <div class="field">

          <label for="name">Feria:</label>
  	 <?php echo $form['id_feria']->render(array('class' => 'select')) ;?></span>
        <p class="hint">Introduzca la feria a la que pertenece la encuesta y el numero de encuesta</p>
         <span class="select"><input id="nro_encuesta" value="Nro. enc"class="input_show_min">
	
</div>  
    <br>
    
<div class="field">
         
 	<p class="hint">Introduzca el numero de la encuesta</p>
</div>  

    <div id="resultado">
        
    </div>

<input id="buscar" type="submit" name="Submit"  class="button_next" value="Buscar" />    
</form>
</div>
<script>
    
    $(document).ready(function(){
         $('input#buscar').click(function(e){
            e.preventDefault(); 
            
            $('#resultado').load('buscaymodifica/',   {tipo_encuesta: $("#encuesta_tipo_encuesta").val() , id_feria: $("#encuesta_id_feria").val(), nro_encuesta: $("#nro_encuesta").val() } ,function() {
            
         });
         });
        $('#nro_encuesta').focus(function(){
            this.value='';
        });
        
        
        
    });
    
    
    </script>