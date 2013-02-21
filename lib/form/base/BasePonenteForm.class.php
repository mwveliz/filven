<?php

/**
 * Ponente form base class.
 *
 * @method Ponente getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePonenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormInputText(),
      'nacionalidad' => new sfWidgetFormInputText(),
      'especialidad' => new sfWidgetFormInputText(),
      'id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nacionalidad' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'especialidad' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'Ponente', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ponente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ponente';
  }


}
