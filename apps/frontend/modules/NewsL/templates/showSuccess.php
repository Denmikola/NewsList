<table>
  <tbody>
    <tr>
      <?php $nw = $new[0]; ?>
      <?php foreach ($langs as $lang): ?>
        <td>      
           <a href="<?php echo url_for('LangS/edit?lid='.$lang->getId().'&pos=show'.'&id='.$newslist->getId().'&nid='.$nw->getId()) ?>" 
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
    </tr>
  </tbody>
</table>

<table>
  <tbody>
    <tr>
      <td>

        <?php if ($newslist->getNewspicture()): ?>
          <div class="logo">
               <img src="<?php echo '/images/',$newslist->getNewspicture() ?>" />
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td><?php echo $newslist->getDateTimeObject('newsdate')->format('d/m/Y') ?></td>
    </tr>
    <tr>
      <td><?php echo $nw->getNewstitle() ?></td>
    </tr>
    <tr>
      <td><?php echo $nw->getNewsanons() ?></td>
    </tr>
    <tr>
      <td><?php echo $nw->getNewstext() ?></td>
    </tr>
  </tbody>
</table>

<hr />

&nbsp;
<a href="<?php echo url_for('NewsL/index') ?>">Вернуться</a>
