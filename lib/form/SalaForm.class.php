<?php

/**
 * Sala form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class SalaForm extends BaseSalaForm
{
  public function configure()
  {
      $this->widgetSchema['descripcion_sala'] = new sfWidgetFormTextarea(array(), array('cols' => 40, 'rows' => 8));
  }
}
