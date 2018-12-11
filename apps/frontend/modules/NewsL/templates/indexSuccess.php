<table>
  <tbody>
    <tr>
      <?php foreach ($langs as $lang): ?>
        <td>      
           <a href=" <?php echo url_for('LangS/edit?lid='.$lang->getId().'&pos=index'); ?> " 
              style="
                  <?php  if ($lang->getDef()==True): ?> 
                  <?php  echo 'color:red'; ?>
                  <?php $deflang=$lang; ?> 
                  <?php endif; ?>"
              title="<?php echo $lang->getFullname(); ?>">
             <?php echo $lang->getShortname(); ?>
           </a>
        </td>
      <?php endforeach; ?>
      <td>
        <h2><a href="<?php echo url_for('LangS/new?lid='.$deflang->getId().'&pos=index'); ?>" ><img src="/images/plus.png" /></a></h2>
      </td>
    </tr>
  </tbody>
</table>

<h1>НОВОСТИ</h1>

<table>
  <tbody>
    <?php foreach ($newslists as $newslist): ?> 
    <?php $nw = $newslist->getNews($deflang->getId()); ?>
    <tr>
      <td>
        <?php if ($newslist->getNewspicture()): ?>
          <div class="logo">
             <img src="<?php echo '/images/s_',$newslist->getNewspicture() ?>" />
          </div>
        <?php endif; ?>
      </td>
      <td>
       <?php echo $newslist->getDateTimeObject('newsdate')->format('d/m/Y'); ?> <br>
       <?php echo $nw->getNewstitle(); ?> <br>
       <a href="<?php echo url_for('NewsL/show?id='.$newslist->getId().'&nid='.$nw->getId().'&lid='.$deflang->getId()); ?>"><?php echo $nw->getNewsanons(); ?>  >>></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<br> <a href="<?php echo url_for('NewsL/new') ?>">Добавить новость</a> <br> <br> 

                             