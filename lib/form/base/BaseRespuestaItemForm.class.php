<?php

/**
 * RespuestaItem form base class.
 *
 * @method RespuestaItem getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRespuestaItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'id_respuesta_encuesta' => new sfWidgetFormPropelChoice(array('model' => 'RespuestaEncuesta', 'add_empty' => true)),
      'valor'                 => new sfWidgetFormInputText(),
      'id_item'               => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'tipo_item'             => new sfWidgetFormInputText(),
      'id_opcion'             => new sfWidgetFormPropelChoice(array('model' => 'OpcionRespuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'RespuestaItem', 'column' => 'id', 'required' => false)),
      'id_respuesta_encuesta' => new sfValidatorPropelChoice(array('model' => 'RespuestaEncuesta', 'column' => 'id', 'required' => false)),
      'valor'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_item'               => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'tipo_item'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_opcion'             => new sfValidatorPropelChoice(array('model' => 'OpcionRespuesta', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('respuesta_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaItem';
  }


}
