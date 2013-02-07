<?php

/**
 * Municipio form base class.
 *
 * @method Municipio getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMunicipioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'municipio' => new sfWidgetFormInputText(),
      'estado'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id', 'required' => false)),
      'municipio' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('municipio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipio';
  }


}
