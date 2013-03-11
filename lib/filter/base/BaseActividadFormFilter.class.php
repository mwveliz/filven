<?php

/**
 * Actividad filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_actividad'         => new sfWidgetFormFilterInput(),
      'ponente'                  => new sfWidgetFormFilterInput(),
      'turno'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ejecutada'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cantidad_participantes_m' => new sfWidgetFormFilterInput(),
      'cantidad_participantes_f' => new sfWidgetFormFilterInput(),
      'alcanzo_tiempo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'causas_incumplimiento'    => new sfWidgetFormFilterInput(),
      'id_municipio'             => new sfWidgetFormFilterInput(),
      'escuela'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'refugio'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'observaciones'            => new sfWidgetFormFilterInput(),
      'id_sala'                  => new sfWidgetFormPropelChoice(array('model' => 'Sala', 'add_empty' => true)),
      'id_tipo_actividad'        => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
      'fecha'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'facilitador'              => new sfWidgetFormFilterInput(),
      'id_feria'                 => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre_actividad'         => new sfValidatorPass(array('required' => false)),
      'ponente'                  => new sfValidatorPass(array('required' => false)),
      'turno'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ejecutada'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cantidad_participantes_m' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_participantes_f' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'alcanzo_tiempo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'causas_incumplimiento'    => new sfValidatorPass(array('required' => false)),
      'id_municipio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'escuela'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'refugio'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'observaciones'            => new sfValidatorPass(array('required' => false)),
      'id_sala'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Sala', 'column' => 'id')),
      'id_tipo_actividad'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoActividad', 'column' => 'id')),
      'fecha'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'facilitador'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_feria'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actividad';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nombre_actividad'         => 'Text',
      'ponente'                  => 'Text',
      'turno'                    => 'Boolean',
      'ejecutada'                => 'Boolean',
      'cantidad_participantes_m' => 'Number',
      'cantidad_participantes_f' => 'Number',
      'alcanzo_tiempo'           => 'Boolean',
      'causas_incumplimiento'    => 'Text',
      'id_municipio'             => 'Number',
      'escuela'                  => 'Boolean',
      'refugio'                  => 'Boolean',
      'observaciones'            => 'Text',
      'id_sala'                  => 'ForeignKey',
      'id_tipo_actividad'        => 'ForeignKey',
      'fecha'                    => 'Date',
      'hora'                     => 'Date',
      'facilitador'              => 'Number',
      'id_feria'                 => 'ForeignKey',
    );
  }
}
