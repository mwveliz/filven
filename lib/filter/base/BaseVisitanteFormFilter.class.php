<?php

/**
 * Visitante filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVisitanteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'numero'      => new sfWidgetFormFilterInput(),
      'id_feria'    => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'tipo_conteo' => new sfWidgetFormFilterInput(),
      'id_sala'     => new sfWidgetFormPropelChoice(array('model' => 'Sala', 'add_empty' => true)),
      'id_acceso'   => new sfWidgetFormPropelChoice(array('model' => 'Acceso', 'add_empty' => true)),
      'hora'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'fecha'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'numero'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_feria'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'tipo_conteo' => new sfValidatorPass(array('required' => false)),
      'id_sala'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Sala', 'column' => 'id')),
      'id_acceso'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Acceso', 'column' => 'id')),
      'hora'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('visitante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visitante';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'fecha'       => 'Date',
      'numero'      => 'Number',
      'id_feria'    => 'ForeignKey',
      'tipo_conteo' => 'Text',
      'id_sala'     => 'ForeignKey',
      'id_acceso'   => 'ForeignKey',
      'hora'        => 'Date',
    );
  }
}
