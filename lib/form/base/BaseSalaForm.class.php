<?php

/**
 * Sala form base class.
 *
 * @method Sala getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSalaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre_sala'      => new sfWidgetFormInputText(),
      'descripcion_sala' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Sala', 'column' => 'id', 'required' => false)),
      'nombre_sala'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion_sala' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sala[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sala';
  }


}
