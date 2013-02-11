<?php

/**
 * Actividad form.
 *
 * @package    filven
 * @subpackage form
 * @author     Your name here
 */
class ActividadForm extends BaseActividadForm
{
  public function configure()
  {
      
      $choices= array(1=>'Mañana' , 0=> 'Tarde' );
      $choicesbool3=array( NULL => '---', 1=>'Sí' , 0 => 'No' ,  );
      $choicesbool2=array( NULL => '---', 1=>'Sí' , 0 => 'No' ,  );
      /*
      $this->widgetSchema['fecha_hora']=  new sfWidgetFormJQueryDate(array(
      'image'=>'/images/calendar.png', 'culture' => 'es', 
      'date_widget' => new sfWidgetFormDate(array('format' => '%day% / %month% / %year% ')),
      
        ));
      $this->validatorSchema['fecha_hora'] = new sfValidatorPass();
      
      $this->widgetSchema['hora'] = new sfWidgetFormTime(array(
      'with_seconds' => true,'can_be_empty'=> false, 
      'format'       => '%hour% : %minute%',
      'default' => date('HH:mm')
    ));

 $this->validatorSchema['hora'] = new sfValidatorPass();
      */
         $this->widgetSchema['id_tipo_actividad'] =new sfWidgetFormPropelChoice(array(
            'model' => 'TipoActividad',
            ));
         
         
         $this->widgetSchema['id_sala'] =new sfWidgetFormPropelChoice(array(
            'model' => 'Sala',
            ));
         
        $this->widgetSchema['nombre_actividad']  = new sfWidgetFormInput(array(),array('size'=>50));
        $this->widgetSchema['ponente']= new sfWidgetFormInput(array(),array('size'=>40));
        $this->widgetSchema['turno']   =  new sfWidgetFormChoice(array('choices' => $choices));
        $this->widgetSchema['ejecutada']   =  new sfWidgetFormChoice(array('choices' => $choicesbool3));
        $this->widgetSchema['cantidad_participantes_m']   =  new sfWidgetFormInput(array(),array('size'=>5));
        $this->widgetSchema['cantidad_participantes f']   =  new sfWidgetFormInput(array(),array('size'=>5));
        $this->widgetSchema['alcanzo_tiempo']   =  new sfWidgetFormChoice(array('choices' => $choicesbool3));
        $this->widgetSchema['causas_incumplimiento']   =  new sfWidgetFormInput(array(),array('size'=>40));
         $this->widgetSchema['id_municipio'] =new sfWidgetFormPropelChoice(array(
         'model' => 'municipio',
            ));
         
        $this->widgetSchema['escuela']   =  new sfWidgetFormChoice(array('choices' => $choicesbool2));
        $this->widgetSchema['refugio']   =  new sfWidgetFormChoice(array('choices' => $choicesbool2));
         $this->widgetSchema['observaciones']   =  new sfWidgetFormTextarea(array(),array('size'=>100));
        
      
  }
}
