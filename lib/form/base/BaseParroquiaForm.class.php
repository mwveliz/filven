<?php

/**
 * Parroquia form base class.
 *
 * @method Parroquia getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseParroquiaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'descripcion'  => new sfWidgetFormInputText(),
      'id_municipio' => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Parroquia', 'column' => 'id', 'required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_municipio' => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parroquia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parroquia';
  }


}
