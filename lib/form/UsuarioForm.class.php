<?php

/**
 * Usuario form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
      $choices= array(1=>'Masculino' , 0=> 'Femenino' );
      $this->widgetSchema['sexo']= new sfWidgetFormChoice(array('choices' => $choices)); 
      
      $choices= array(1=>'Si' , 0=> 'No' );
      $this->widgetSchema['activo']= new sfWidgetFormChoice(array('choices' => $choices));
      
      $this->widgetSchema['password']= new sfWidgetFormInputPassword();
      $this->setValidators(array('password'=> new sfValidatorPass()));
  }
}
