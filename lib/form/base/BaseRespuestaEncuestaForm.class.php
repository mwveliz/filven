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
      'id'        => new sfWidgetFormInputHidden(),
      'id_item'   => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'respuesta' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'RespuestaEncuesta', 'column' => 'id', 'required' => false)),
      'id_item'   => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'respuesta' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
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
