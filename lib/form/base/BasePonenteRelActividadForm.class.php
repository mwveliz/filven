<?php

/**
 * PonenteRelActividad form base class.
 *
 * @method PonenteRelActividad getObject() Returns the current form's model object
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePonenteRelActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_actividad' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_ponente'   => new sfWidgetFormPropelChoice(array('model' => 'Ponente', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'PonenteRelActividad', 'column' => 'id', 'required' => false)),
      'id_actividad' => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'id_ponente'   => new sfValidatorPropelChoice(array('model' => 'Ponente', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ponente_rel_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PonenteRelActividad';
  }


}
