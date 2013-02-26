<?php

/**
 * RespuestaEncuesta filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRespuestaEncuestaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero_encuesta' => new sfWidgetFormFilterInput(),
      'fecha'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'observacion'     => new sfWidgetFormFilterInput(),
      'nombre'          => new sfWidgetFormFilterInput(),
      'apellido'        => new sfWidgetFormFilterInput(),
      'telefono'        => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(),
      'id_encuesta'     => new sfWidgetFormPropelChoice(array('model' => 'Encuesta', 'add_empty' => true)),
      'hora'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'numero_encuesta' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'observacion'     => new sfValidatorPass(array('required' => false)),
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'apellido'        => new sfValidatorPass(array('required' => false)),
      'telefono'        => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'id_encuesta'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Encuesta', 'column' => 'id')),
      'hora'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('respuesta_encuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RespuestaEncuesta';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'numero_encuesta' => 'Number',
      'fecha'           => 'Date',
      'observacion'     => 'Text',
      'nombre'          => 'Text',
      'apellido'        => 'Text',
      'telefono'        => 'Text',
      'email'           => 'Text',
      'id_encuesta'     => 'ForeignKey',
      'hora'            => 'Date',
    );
  }
}
