<?php

/**
 * Informe form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class InformeForm extends BaseInformeForm
{
  public function configure()
  {
      $this->widgetSchema['fecha_informe'] = new sfWidgetFormInput();
  }
}
