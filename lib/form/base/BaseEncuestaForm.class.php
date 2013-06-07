<?php

/**
 * Encuesta form base class.
 *
 * @method Encuesta getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEncuestaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nombre_encuesta'      => new sfWidgetFormInputText(),
      'descripcion_encuesta' => new sfWidgetFormInputText(),
      'tipo_encuesta'        => new sfWidgetFormInputText(),
      'fecha_elaboracion'    => new sfWidgetFormDate(),
      'id_feria'             => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'nombre_encuesta'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion_encuesta' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_encuesta'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_elaboracion'    => new sfValidatorDate(array('required' => false)),
      'id_feria'             => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Encuesta';
  }


}
