<?php

/**
 * RespuestaEncuesta form base class.
 *
 * @method RespuestaEncuesta getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRespuestaEncuestaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'numero_encuesta' => new sfWidgetFormInputText(),
      'fecha'           => new sfWidgetFormDate(),
      'observacion'     => new sfWidgetFormInputText(),
      'nombre'          => new sfWidgetFormInputText(),
      'apellido'        => new sfWidgetFormInputText(),
      'telefono'        => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'id_encuesta'     => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
      'hora'            => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'RespuestaEncuesta', 'column' => 'id', 'required' => false)),
      'numero_encuesta' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'fecha'           => new sfValidatorDate(array('required' => false)),
      'observacion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_encuesta'     => new sfValidatorPropelChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'hora'            => new sfValidatorTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('respuesta_encuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaEncuesta';
  }


}
