<?php

/**
 * Informe filter form base class.
 *
 * @package    filven
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseInformeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo_informe' => new sfWidgetFormFilterInput(),
      'fecha_informe'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'creado_por'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'titulo_informe' => new sfValidatorPass(array('required' => false)),
      'fecha_informe'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'creado_por'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('informe_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Informe';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'titulo_informe' => 'Text',
      'fecha_informe'  => 'Date',
      'creado_por'     => 'Text',
    );
  }
}
