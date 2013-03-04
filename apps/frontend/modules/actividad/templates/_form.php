<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<script>
jQuery(document).ready(function() {
    
    id = $("select#actividad_id_sala").children(":selected").val();
    if (id == 8) {
        $('div#div_refugio').css("visibility", "visible"); 
        $('div#div_escuela').css("visibility", "visible"); 
    } else {
        $('div#div_refugio').css("visibility", "hidden"); 
        $('div#div_escuela').css("visibility", "hidden");
    }
    if (id == 9) {
        $('div#div_facilitadores').css("visibility", "visible") 
    } else {
        $('div#div_facilitadores').css("visibility", "hidden");
    }    
    
     $(document).on("click","select#estados", function(){
        var estado = $(this).children(":selected").val();
        $.ajax({
                  type: "POST",
                  url: "<?php   echo url_for('actividad/MostrarMunicipios')?>",
                  data: "estado=" + estado, 
                  success:function(message){
                            var JSONobject = JSON.parse(message);
                             select_municipio = '<select class="select" id="municipios" name="municipios">'
                             $.each(JSONobject, function(index, value) {
                                  select_municipio += '<option id="'+index+'">'+ JSONobject[index]['municipio'];+'</option>'
                             });
                             select_municipio += '</select>';
                             $('#span_municipio').empty();
                             $('#span_municipio').append(select_municipio);
                  }
       });
    });
    
     if ($('#input_actividad').val() > 0) {
        var url = window.location.pathname;
        var id_actividad = url.split("id/")
        $.ajax({
                  type: "POST",
                  url: "<?php   echo url_for('actividad/MostrarEstados')?>",
                  data: "id_actividad=" + id_actividad[1], 
                  success:function(message){
                            var JSONobject = JSON.parse(message);
                             $.each(JSONobject, function(index, value) {
                                select_municipio = JSONobject[index]['select_municipio'];
                                select_estado = JSONobject[index]['select_estado'];
                             }); 
                             $('#span_estados').empty();
                             $('#span_estados').append(select_estado);                            
                             $('#span_municipio').empty();
                             $('#span_municipio').append(select_municipio);

                  }
       }); 
     } else {
            $.ajax({
                  type: "POST",
                  url: "<?php   echo url_for('actividad/MostrarEstadosInicial')?>",
                  data: "id_municipio= 1", 
                  success:function(message){
                            var JSONobject = JSON.parse(message);
                             $.each(JSONobject, function(index, value) {
                                select_estado = JSONobject[index]['select_estado'];
                             }); 
                             $('#span_estados').empty();
                             $('#span_estados').append(select_estado);                            
                  }
         });         
     } 
     
     
     

$(document).on("click","select#actividad_id_sala", function(){
    id = $(this).children(":selected").val();
    if (id == 8) {
        $('div#div_refugio').css("visibility", "visible") 
        $('div#div_escuela').css("visibility", "visible") 
    } else {
        $('div#div_refugio').css("visibility", "hidden") ; 
        $('div#div_escuela').css("visibility", "hidden");
    }
    if (id == 9) {
        $('div#div_facilitadores').css("visibility", "visible") 
    } else {
        $('div#div_facilitadores').css("visibility", "hidden");
    }    
});

$(document).on("click","img#agrega_ponente", function(){
    
     
    $(this).before($("select#ponente").clone().attr('id', 'extraponente').attr('name', 'extraponente[]') );
    
    
    
});




});     
</script>


<div class="container">
<form id="formulario" action="<?php echo url_for('actividad/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Fecha</label>
  	<?php echo $form['fecha']->render(array('type' => 'date')) ?>&nbsp;&nbsp;<?php echo $form['hora']->render(array('type' => 'time')) ?> 
	<p class="hint">Introduzca la fecha y hora de la actividad</p>
</div>
<div class="field">
	<label for="name">Feria</label>
         <span class="select"><?php echo $form['id_feria']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Selecciona la feria</p>
</div>
<div class="field">
	<label for="name">Tipo</label>
         <span class="select"><?php echo $form['id_tipo_actividad']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Selecciona el tipo de actividad</p>
</div>
<div class="field">
	<label for="name">Sala</label>
  	 <span class="select"><?php echo $form['id_sala']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Selecciona la sala en la que se realizará la actividad</p>
</div>
<div class="field">
	<label for="name">Actividad</label>
  	 <?php echo $form['nombre_actividad']->render(array('class' => 'input','id' => 'nombre_actividad')) ?>
	<p class="hint">Introduzca el nombre de la actividad</p>
</div>  
<div class="field">
	<label for="name">Ponente(s)</label>
  	 <?php echo $form['ponente']->render(array('class' => 'input','id' => 'ponente')) ?>
	<p class="hint">Introduzca el nombre del ponente</p> 
        <p><img id="agrega_ponente" src="/images/blue_add.png"></p>
</div>  
<div class="field">
	<label for="name">Turno</label>
        <span class="select"><?php echo $form['turno']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique el turno en el que se realizará la actividad</p>
</div>        
<div class="field">
	<label for="name">Ejecutada</label>
        <span class="select"><?php echo $form['ejecutada']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad ha sido ejecutada</p>
</div> 
<div class="field">
	<label for="name">N° part. masculino</label>
        <?php echo $form['cantidad_participantes_m']->render(array('class' => 'input','id' => 'cantidad_participantes_m')) ?>
	<p class="hint">Indique el número de participantes del sexo masculino</p>
</div> 
<div class="field">
	<label for="name">N° part. femenino</label>
        <?php echo $form['cantidad_participantes_f']->render(array('class' => 'input','id' => 'cantidad_participantes_f')) ?>
	<p class="hint">Indique el número de participantes del sexo femenino</p>
</div> 
<div class="field">
	<label for="name">Alcanzó el tiempo?</label>
        <span class="select"><?php echo $form['alcanzo_tiempo']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad finalizó en el tiempo estipulado</p>
</div> 
<div class="field">
	<label for="name">Causas de incumplimiento</label>
        <?php echo $form['causas_incumplimiento']->render(array('class' => 'input','id' => 'cantidad_participantes_m')) ?>
	<p class="hint">Indique las causas del incumplimiento</p>
</div> 
<br>
<div class="field">
	<label for="name">Estado</label>  
        <span class="select" id="span_estados"><select class="select" id="estados" name="estados" disabled="disabled"><option id="1">DTTO. CAPITAL</option></select></span>
	<p class="hint">Indique el estado en donde se realizó la actividad</p>
</div> 
<div class="field">
	<label for="name">Municipio</label>
        <span class="select"><span id="span_municipio"><select class="select" id="municipios" name="municipios"><option id="1">LIBERTADOR</option></select></span></span>
	<p class="hint">Indique el municipio en donde se realizó la actividad</p>
</div> 
<div class="field" id="div_escuela" style="visibility: hidden" >
	<label for="name">Escuela</label>
        <span class="select"><?php echo $form['escuela']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad se realizó en una escuela</p>
</div> 
<div class="field" id="div_refugio" style="visibility: hidden">
	<label for="name">Refugio</label>
        <span class="select"><?php echo $form['refugio']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad se realizó en un refugio</p>
</div>
<!--
<div class="field">
	<label for="name">Ponente</label>
  	<span class="select"><?php echo $form['id_ponente']->render(array('class' => 'select')) ?></span>
	<p class="hint">Seleccione el ponente</p>
</div> 
-->
<div class="field" id="div_facilitadores">
	<label for="name">N° Facilitadores</label>
  	<?php echo $form['facilitador']->render(array('class' => 'input', 'id' => 'facilitador')) ?>
	<p class="hint">Incluya el número de facilitadores</p>
</div>  
<div class="field">
	<label for="name">Observaciones</label>
  	 <?php echo $form['observaciones']->render(array('class' => 'input textarea','id' => 'observaciones')) ?>
	<p class="hint">Incluya las observaciones adicionales que desee añadir</p>
</div> 
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>

<input style="visibility:hidden;" id="input_actividad" value="<? echo $sf_params->get('id'); ?>">