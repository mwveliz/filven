<?php

/**
 * Ponente form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class PonenteForm extends BasePonenteForm
{
  public function configure()
  {
      $choices= array('Venezolano'=>'Venezolano' , 'Extranjero'=> 'Extranjero' );
      $this->widgetSchema['nacionalidad']= new sfWidgetFormChoice(array('choices' => $choices));
  }
}
