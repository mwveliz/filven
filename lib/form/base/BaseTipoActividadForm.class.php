<?php

/**
 * TipoActividad form base class.
 *
 * @method TipoActividad getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre_tipo'      => new sfWidgetFormInputText(),
      'descripcion_tipo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'TipoActividad', 'column' => 'id', 'required' => false)),
      'nombre_tipo'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion_tipo' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoActividad';
  }


}
