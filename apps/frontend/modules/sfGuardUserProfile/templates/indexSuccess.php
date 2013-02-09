<h1>SfGuardUserProfiles List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Birthday</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sfGuardUserProfiles as $sfGuardUserProfile): ?>
    <tr>
      <td><a href="<?php echo url_for('sfGuardUserProfile/show?id='.$sfGuardUserProfile->getId()) ?>"><?php echo $sfGuardUserProfile->getId() ?></a></td>
      <td><?php echo $sfGuardUserProfile->getUserId() ?></td>
      <td><?php echo $sfGuardUserProfile->getFirstName() ?></td>
      <td><?php echo $sfGuardUserProfile->getLastName() ?></td>
      <td><?php echo $sfGuardUserProfile->getBirthday() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('sfGuardUserProfile/new') ?>">New</a>
