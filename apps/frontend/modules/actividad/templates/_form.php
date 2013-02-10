<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<script>
   
$(function() {
    
    $('select.fecha_hora').change(function(){
        alert('www');
        $('select#actividad_fecha_hora_day').attr('enabled', true) ;
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
  	 <?php echo $form['fecha_hora']->render(array('class'=>'fecha_hora')) ;?> <?php echo " " . $form['hora']?>
	<p class="hint">Introduzca la fecha de la actividad</p>
</div>  
<div class="field">
	<label for="name">Tipo</label>
         <span class="select"><?php echo $form['id_tipo_actividad']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Introduzca el tipo de actividad</p>
</div>
<div class="field">
	<label for="name">Sala</label>
  	 <span class="select"><?php echo $form['id_sala']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Introduzca la sala en la que se realizará la actividad</p>
</div>
<div class="field">
	<label for="name">Actividad</label>
  	 <?php echo $form['nombre_actividad']->render(array('class' => 'input','id' => 'nombre_actividad')) ?>
	<p class="hint">Introduzca el nombre de la actividad</p>
</div>  
<div class="field">
	<label for="name">Ponente</label>
  	 <?php echo $form['ponente']->render(array('class' => 'input','id' => 'ponente')) ?>
	<p class="hint">Introduzca el nombre del ponente</p>
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
        <?php echo $form['cantidad_participantes_m']->render(array('class' => 'input','id' => 'cantidad_participantes_m')) ?>
	<p class="hint">Indique las causas del incumplimiento</p>
</div> 
<br>
<div class="field">
	<label for="name">Municipio</label>
        <span class="select"><?php echo $form['id_municipio']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique el municipio en donde se realizó la actividad</p>
</div> 
<div class="field">
	<label for="name">Escuela</label>
        <span class="select"><?php echo $form['escuela']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad se realizó en una escuela</p>
</div> 
<div class="field">
	<label for="name">Refugio</label>
        <span class="select"><?php echo $form['refugio']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique si la actividad se realizó en un refugio</p>
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
