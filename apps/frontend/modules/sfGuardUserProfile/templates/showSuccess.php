<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sfGuardUserProfile->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $sfGuardUserProfile->getUserId() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $sfGuardUserProfile->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $sfGuardUserProfile->getLastName() ?></td>
    </tr>
    <tr>
      <th>Birthday:</th>
      <td><?php echo $sfGuardUserProfile->getBirthday() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sfGuardUserProfile/edit?id='.$sfGuardUserProfile->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sfGuardUserProfile/index') ?>">List</a>
