<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $lang->getId() ?></td>
    </tr>
    <tr>
      <th>Shortname:</th>
      <td><?php echo $lang->getShortname() ?></td>
    </tr>
    <tr>
      <th>Fullname:</th>
      <td><?php echo $lang->getFullname() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $lang->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $lang->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('LangS/edit?id='.$lang->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('LangS/index') ?>">List</a>
