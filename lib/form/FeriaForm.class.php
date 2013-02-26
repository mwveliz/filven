<?php

/**
 * Feria form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class FeriaForm extends BaseFeriaForm
{
  public function configure()
  {
      
      $this->widgetSchema['fecha_inicio'] = new sfWidgetFormInput();
      $this->widgetSchema['fecha_fin'] = new sfWidgetFormInput();

      
  }
}
