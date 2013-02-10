<?php

/**
 * Visitante form base class.
 *
 * @method Visitante getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVisitanteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'fecha'  => new sfWidgetFormDate(),
      'numero' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'Visitante', 'column' => 'id', 'required' => false)),
      'fecha'  => new sfValidatorDate(array('required' => false)),
      'numero' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('visitante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visitante';
  }


}
