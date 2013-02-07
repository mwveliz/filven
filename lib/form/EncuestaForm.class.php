<?php

/**
 * Encuesta form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class EncuestaForm extends BaseEncuestaForm
{
  public function configure()
  {
      $choices= array('Expositor'=>'Expositor' , 'Visitante'=> 'Visitante' );
      $this->widgetSchema['tipo_encuesta']= new sfWidgetFormChoice(array('choices' => $choices));
      
      
      
      
  }
}
