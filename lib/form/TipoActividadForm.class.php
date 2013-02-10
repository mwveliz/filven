<?php

/**
 * TipoActividad form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class TipoActividadForm extends BaseTipoActividadForm
{
  public function configure()
  {
      $this->widgetSchema['descripcion_tipo'] = new sfWidgetFormTextarea(array(), array('cols' => 40, 'rows' => 8));
  }
}
