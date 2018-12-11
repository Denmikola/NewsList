<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('NewsL/create?id='.$form->getObject()->getId()) ?>" 
      method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('NewsL/index') ?>">Вернуться</a>
          <input type="submit" value="Далее" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>

    </tbody>
  </table>
</form>
