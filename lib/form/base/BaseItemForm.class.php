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
      'id'          => new sfWidgetFormInputHidden(),
      'numeracion'  => new sfWidgetFormInputText(),
      'texto'       => new sfWidgetFormInputText(),
      'tipo_item'   => new sfWidgetFormInputText(),
      'maximo'      => new sfWidgetFormInputText(),
      'id_encuesta' => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      'numeracion'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'texto'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_item'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'maximo'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_encuesta' => new sfValidatorPropelChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
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
