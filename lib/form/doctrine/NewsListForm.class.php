<?php

/**
 * NewsList form.
 *
 * @package    newslist
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsListForm extends BaseNewsListForm
{
  public function configure()
  {

    $this->widgetSchema->setLabels(array(
         'newsdate'    => 'Дата новости д-м-г',
         'newspicture' => 'Имя файла картинки'
    ));

  }
}
