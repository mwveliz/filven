<?php

/**
 * Feria form base class.
 *
 * @method Feria getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFeriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'descripcion'  => new sfWidgetFormInputText(),
      'fecha_inicio' => new sfWidgetFormDate(),
      'fecha_fin'    => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_inicio' => new sfValidatorDate(array('required' => false)),
      'fecha_fin'    => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('feria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feria';
  }


}
