<?php

/**
 * MedicalRevision form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MedicalRevisionForm extends BaseMedicalRevisionForm
{
  public function configure()
  {
  	$dateWidget = new sfWidgetFormI18nDate(array(
			'format' => '%day%/%month%/%year%',
  			 'culture' => 'es'));
 	 $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
  'config' => '{ }', 'culture' => 'es', 'date_widget' => $dateWidget));
  }
}
