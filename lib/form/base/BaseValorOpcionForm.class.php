<?php

/**
 * ValorOpcion form base class.
 *
 * @method ValorOpcion getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseValorOpcionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'id_opcion'           => new sfWidgetFormInputText(),
      'valor'               => new sfWidgetFormInputText(),
      'id_opcion_respuesta' => new sfWidgetFormPropelChoice(array('model' => 'OpcionRespuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'ValorOpcion', 'column' => 'id', 'required' => false)),
      'id_opcion'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'valor'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_opcion_respuesta' => new sfValidatorPropelChoice(array('model' => 'OpcionRespuesta', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('valor_opcion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ValorOpcion';
  }


}
