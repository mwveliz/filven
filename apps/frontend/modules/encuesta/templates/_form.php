<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('encuesta/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Nombre encuesta</label>
  	 <?php echo $form['nombre_encuesta']->render(array('class' => 'input','id' => 'nombre_encuesta')) ?>
	<p class="hint">Introduzca el nombre de la encuesta</p>
</div>  
<div class="field">
	<label for="name">Descripción</label>
  	 <?php echo $form['descripcion_encuesta']->render(array('class' => 'input textarea','id' => 'descripcion_encuesta')) ?>
	<p class="hint">Introduzca la descripción de la encuesta</p>
</div> 
<div class="field">
	<label for="name">Fecha</label>
  	 <?php echo $form['fecha_elaboracion']->render(array('class'=>'fecha_elaboracion','type' => 'date')) ;?> <?php /* echo " " . $form['hora'] */?>
	<p class="hint">Introduzca la fecha de elaboración de la encuesta</p>
</div> 
<br>
<div class="field">
	<label for="name">Tipo</label>
  	 <span class="select"><?php echo $form['tipo_encuesta']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Introduzca el tipo de encuesta</p>
</div>
<div class="field">
	<label for="feria">Feria</label>
  	 <span class="select"><?php echo $form['id_feria']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Introduzca a que feria corresposnde esta encuesta</p>
</div>

        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button_next" value="Siguiente" />    
</form>
</div>
