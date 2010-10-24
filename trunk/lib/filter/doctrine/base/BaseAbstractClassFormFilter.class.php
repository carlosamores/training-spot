<?php

/**
 * AbstractClass filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAbstractClassFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'place_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Place'), 'add_empty' => true)),
      'class_type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClassType'), 'add_empty' => true)),
      'day_of_the_week' => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6))),
      'start_hour'      => new sfWidgetFormChoice(array('choices' => array('' => '', 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'end_hour'        => new sfWidgetFormChoice(array('choices' => array('' => '', 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'start_min'       => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'end_min'         => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'clients_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Client')),
      'coaches_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Coach')),
    ));

    $this->setValidators(array(
      'place_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Place'), 'column' => 'id')),
      'class_type_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ClassType'), 'column' => 'id')),
      'day_of_the_week' => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6))),
      'start_hour'      => new sfValidatorChoice(array('required' => false, 'choices' => array(7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'end_hour'        => new sfValidatorChoice(array('required' => false, 'choices' => array(7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24))),
      'start_min'       => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'end_min'         => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55))),
      'clients_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Client', 'required' => false)),
      'coaches_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Coach', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('abstract_class_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addClientsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ClassPerClient ClassPerClient')
      ->andWhereIn('ClassPerClient.client_id', $values)
    ;
  }

  public function addCoachesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ClassPerCoach ClassPerCoach')
      ->andWhereIn('ClassPerCoach.coach_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'AbstractClass';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'place_id'        => 'ForeignKey',
      'class_type_id'   => 'ForeignKey',
      'day_of_the_week' => 'Enum',
      'start_hour'      => 'Enum',
      'end_hour'        => 'Enum',
      'start_min'       => 'Enum',
      'end_min'         => 'Enum',
      'clients_list'    => 'ManyKey',
      'coaches_list'    => 'ManyKey',
    );
  }
}
