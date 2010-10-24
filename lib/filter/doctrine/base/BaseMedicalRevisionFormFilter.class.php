<?php

/**
 * MedicalRevision filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMedicalRevisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'passed'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'comments'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'client_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'passed'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'comments'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('medical_revision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MedicalRevision';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'client_id' => 'ForeignKey',
      'date'      => 'Date',
      'passed'    => 'Boolean',
      'comments'  => 'Text',
    );
  }
}
