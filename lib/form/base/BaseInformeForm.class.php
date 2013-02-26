<?php

/**
 * Informe form base class.
 *
 * @method Informe getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseInformeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'titulo_informe' => new sfWidgetFormInputText(),
      'fecha_informe'  => new sfWidgetFormDate(),
      'creado_por'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Informe', 'column' => 'id', 'required' => false)),
      'titulo_informe' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_informe'  => new sfValidatorDate(array('required' => false)),
      'creado_por'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('informe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Informe';
  }


}
