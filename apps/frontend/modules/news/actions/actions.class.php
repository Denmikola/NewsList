<?php

/**
 * news actions.
 *
 * @package    newslist
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->newss = Doctrine_Core::getTable('News')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->news = Doctrine_Core::getTable('News')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->news);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewsForm();
    $this->form->setDefault('news_id',$request->getParameter('nid'));
    $this->nid=$request->getParameter('nid');
    $langs = Doctrine_Core::getTable('lang')->getLangs();
    $lnum=$request->getParameter('lnum'); 
    if ($lnum > count($langs)-1): $this->redirect('NewsL/index'); endif;
    $this->label=$langs[$lnum]->getFullname();
    $this->form->setDefault('lang_id', $langs[$lnum]->getId());
    $this->lnum=$lnum+1;
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewsForm();

    $this->processForm($request, $this->form);
    $this->nid=$request->getParameter('nid');
    $this->label=$request->getParameter('label');
    $this->lnum=$request->getParameter('lnum');
    $this->setTemplate('new');
  }


   protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $news = $form->save();

      $this->redirect('news/new?nid='.$request->getParameter('nid').'&lnum='.$request->getParameter('lnum'));
    }
  }
}
