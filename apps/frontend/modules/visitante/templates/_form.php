<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('visitante/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Fecha</label>
  	 <?php echo $form['fecha']->render(array('type' => 'date')) ?>&nbsp;&nbsp;<?php echo $form['hora']->render(array('type' => 'time')) ?>
	<p class="hint">Seleccione la fecha y hora deseada</p>
</div>  
<div class="field">
	<label for="name">Número de visitantes</label>
  	 <?php echo $form['numero']->render(array('class' => 'input','id' => 'numero')) ?>
	<p class="hint">Introduzca el número de visitantes</p>
</div> 
<br>
<div class="field">
	<label for="name">Tipo de conteo</label>
        <span class="select"><?php echo $form['tipo_conteo']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique el tipo de conteo</p>
</div> 
<br>
<div class="field">
	<label for="name">Feria</label>
        <span class="select"><?php echo $form['id_feria']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique la feria</p>
</div>
<br>
<div class="field">
	<label for="name">Acceso</label>
        <span class="select"><?php echo $form['id_acceso']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Indique el acceso</p>
</div> 
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>