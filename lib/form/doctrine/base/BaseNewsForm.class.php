<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNewsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'news_id'    => new sfWidgetFormInputHidden(),
      'lang_id'    => new sfWidgetFormInputHidden(),
      'newstitle'  => new sfWidgetFormInputText(),
      'newsanons'  => new sfWidgetFormTextarea(),
      'newstext'   => new sfWidgetFormTextarea()
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'news_id'    => new sfValidatorInteger(),
      'lang_id'    => new sfValidatorInteger(),
      'newstitle'  => new sfValidatorPass(array('required' => true)),
      'newsanons'  => new sfValidatorPass(array('required' => true)),
      'newstext'   => new sfValidatorPass(array('required' => true))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'News', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }

}
