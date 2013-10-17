<?php include '../../common/view/header.html.php';?>
<div class='row'>
  <div class='col-md-6'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <?php echo $lang->user->perfectAccount;?>
      </div>
      <div class='panel-body'>
        <form method='post' id='addaccountForm' action='<?php echo $this->createLink('user', 'addAccount');?>' role='form'>
          <div class='form-group'>
            <label for='username'><?php echo $lang->user->account;?></label>
            <?php echo html::input('account', '', "id='username'") . '<font color="red">*</font>' . $lang->user->register->lblAccount;?>
          </div>
          <div class='form-group'>
            <label for='email'><?php echo $lang->user->email;?></label>
            <?php echo html::input('email', '', "id='email'") . '<font color="red">*</font>';?>
          </div>
          <?php 
          echo html::submitButton('', 'btn btn-success btn-wider');
          echo html::hidden('referer', $referer);
          echo html::hidden('openID', $user['id']);
          ?>
        </form>
      </div>
    </div>
  </div>
  <div class='col-md-6'>
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <?php echo $lang->user->bind;?>
      </div>
      <div class='panel-body'>
        <form method='post' id='bindForm' action='<?php echo $this->createLink('user', 'bind');?>' role='form'>
          <div class='form-group'>
            <label for='useraccount'><?php echo $lang->user->account;?></label>
            <?php echo html::input('account', '', "id='useraccount'" )?>
          </div>
          <div class='form-group'>
            <label for='password'>
              <?php 
              echo $lang->user->password;
              echo html::a($this->createLink('user', 'resetpassword'), $lang->forgotPassword, '');
              ?>
            </label>
            <?php echo html::password('password', '', "id='password'");?>
          </div>
          <?php 
          echo html::submitButton($lang->login, 'btn btn-success btn-wider');
          echo html::hidden('referer', $referer);
          echo html::hidden('openID', $user['id']);
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>