<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('sala/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="tabla_usuario">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('sala/index') ?>">Ir al listado</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Eliminar', 'sala/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>


<div class="container">

<form id="formulario" method="post" action="">
<h3>Contact Form</h3>
<div class="field">
	<label for="name">Name:</label>
  	<input type="text" class="input" name="name" id="name" />
	<p class="hint">Enter your name.</p>
</div>

<div class="field">
	<label for="email">Email:</label>
  	<input type="text" class="input" name="email" id="email" />
	<p class="hint">Enter your email.</p>
</div>

<div class="field">
	<label for="message">Message:</label>
  	<textarea class="input textarea" name="message" id="message"></textarea>
	<p class="hint">Write your message.</p>
</div>


<input type="submit" name="Submit"  class="button" value="Submit" />
</form>
