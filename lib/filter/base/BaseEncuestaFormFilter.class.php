<?php

/**
 * Encuesta filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEncuestaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_encuesta'      => new sfWidgetFormFilterInput(),
      'descripcion_encuesta' => new sfWidgetFormFilterInput(),
      'tipo_encuesta'        => new sfWidgetFormFilterInput(),
      'fecha_elaboracion'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre_encuesta'      => new sfValidatorPass(array('required' => false)),
      'descripcion_encuesta' => new sfValidatorPass(array('required' => false)),
      'tipo_encuesta'        => new sfValidatorPass(array('required' => false)),
      'fecha_elaboracion'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('encuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Encuesta';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'nombre_encuesta'      => 'Text',
      'descripcion_encuesta' => 'Text',
      'tipo_encuesta'        => 'Text',
      'fecha_elaboracion'    => 'Date',
    );
  }
}
