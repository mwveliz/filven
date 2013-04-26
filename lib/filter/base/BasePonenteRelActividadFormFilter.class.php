<?php

/**
 * PonenteRelActividad filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePonenteRelActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actividad' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_ponente'   => new sfWidgetFormPropelChoice(array('model' => 'Ponente', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_actividad' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'id_ponente'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Ponente', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ponente_rel_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PonenteRelActividad';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_actividad' => 'ForeignKey',
      'id_ponente'   => 'ForeignKey',
    );
  }
}
