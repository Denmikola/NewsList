<h1>Langs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Shortname</th>
      <th>Fullname</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($langs as $lang): ?>
    <tr>
      <td><a href="<?php echo url_for('LangS/show?id='.$lang->getId()) ?>"><?php echo $lang->getId() ?></a></td>
      <td><?php echo $lang->getShortname() ?></td>
      <td><?php echo $lang->getFullname() ?></td>
      <td><?php echo $lang->getCreatedAt() ?></td>
      <td><?php echo $lang->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('LangS/new') ?>">New</a>
