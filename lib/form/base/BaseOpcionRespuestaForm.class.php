<?php

/**
 * OpcionRespuesta form base class.
 *
 * @method OpcionRespuesta getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseOpcionRespuestaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'id_item'          => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => true)),
      'respuesta'        => new sfWidgetFormInputText(),
      'seleccion_simple' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'OpcionRespuesta', 'column' => 'id', 'required' => false)),
      'id_item'          => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'respuesta'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'seleccion_simple' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('opcion_respuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OpcionRespuesta';
  }


}
