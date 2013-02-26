<?php

/**
 * Visitante form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class VisitanteForm extends BaseVisitanteForm
{
  public function configure()
  {
      $conteo = array( 1=>'Sticker' , 0 => 'Manual');
      $this->widgetSchema['tipo_conteo']   =  new sfWidgetFormChoice(array('choices' => $conteo));
      
      $this->widgetSchema['fecha'] = new sfWidgetFormInput();
      $this->widgetSchema['hora'] = new sfWidgetFormInput();
  }
}
