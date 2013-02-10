<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="container">  
<form id="formulario" action="<?php echo url_for('pagina/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="field">
	<label for="name">Informe</label>
  	 <span class="select"><?php echo $form['id_informe']->render(array('class' => 'select')) ;?></span>
	<p class="hint">Selecciona el informe</p>
</div>
<div class="field">
	<label for="name">Título</label>
  	 <?php echo $form['titulo_informe']->render(array('class' => 'input','id' => 'titulo_informe')) ?>
	<p class="hint">Introduzca el título del informe</p>
</div>  
<div class="field">
	<label for="name">Ante cuadro</label>
  	 <?php echo $form['ante_cuadro']->render(array('class' => 'input','id' => 'ante_cuadro')) ?>
	<p class="hint">Introduzca la información preliminar al cuadro</p>
</div> 
<div class="field">
	<label for="name">Título del cuadro</label>
  	 <?php echo $form['titulo_cuadro']->render(array('class' => 'input','id' => 'titulo_cuadro')) ?>
	<p class="hint">Introduzca el título del cuadro</p>
</div> 
<div class="field">
	<label for="name">Post cuadro</label>
  	 <?php echo $form['post_cuadro']->render(array('class' => 'input','id' => 'post_cuadro')) ?>
	<p class="hint">Introduzca la información posterior al cuadro</p>
</div> 
<div class="field">
	<label for="name">Texto</label>
  	 <?php echo $form['texto_posterior']->render(array('class' => 'input textarea','id' => 'texto_posterior')) ?>
	<p class="hint">Introduzca el texto deseado</p>
</div> 
<div class="field">
	<label for="name">Ante gráfico</label>
  	 <?php echo $form['ante_grafico']->render(array('class' => 'input','id' => 'ante_grafico')) ?>
	<p class="hint">Introduzca la información preliminar al gráfico</p>
</div> 
<div class="field">
	<label for="name">Post gráfico</label>
  	 <?php echo $form['post_grafico']->render(array('class' => 'input','id' => 'post_grafico')) ?>
	<p class="hint">Introduzca la información posterior al gráfico</p>
</div>
<div class="field">
	<label for="name">Tipo de gráfico</label>
  	 <?php echo $form['tipo_grafico']->render(array('class' => 'input','id' => 'titulo_grafico')) ?>
	<p class="hint">Introduzca el tipo de gráfico que desea generar</p>
</div>
        <?php echo $form['id'] ?>
        <? echo $form['_csrf_token']?>
<input type="submit" name="Submit"  class="button" value="Enviar" />    
</form>
</div>