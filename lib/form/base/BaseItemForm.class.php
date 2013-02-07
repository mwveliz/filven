<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'texto'              => new sfWidgetFormInputText(),
      'id_encuesta'        => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
      'seleccion_simple'   => new sfWidgetFormInputCheckbox(),
      'identificador_item' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'texto'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_encuesta'        => new sfValidatorPropelChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'seleccion_simple'   => new sfValidatorBoolean(array('required' => false)),
      'identificador_item' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }


}
