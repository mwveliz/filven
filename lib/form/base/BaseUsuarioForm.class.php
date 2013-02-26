<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInputText(),
      'apellido'          => new sfWidgetFormInputText(),
      'usuario'           => new sfWidgetFormInputText(),
      'password'          => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'telefono'          => new sfWidgetFormInputText(),
      'sexo'              => new sfWidgetFormInputCheckbox(),
      'activo'            => new sfWidgetFormInputCheckbox(),
      'id_sf_guard_group' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'usuario'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'              => new sfValidatorBoolean(array('required' => false)),
      'activo'            => new sfValidatorBoolean(array('required' => false)),
      'id_sf_guard_group' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


}
