<?php

/**
 * News form.
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
         'newstitle' => 'Заголовок',
         'newsanons' => 'Анонс',
         'newstext'  => 'Текст'
    ));

     $this->validatorSchema['newstitle'] = new sfValidatorRegex(
       array(
          'pattern' => '/^[^<>]*$/i',
            ),
       array(
          'invalid' => 'В поле "Заголовок" недопустимы тэги HTML!',
            )
     );

  }
}
