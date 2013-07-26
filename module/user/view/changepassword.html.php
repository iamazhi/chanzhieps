<?php include '../../common/view/header.admin.html.php';?>
<div class='row'>
    <form method='post' id="ajaxForm" class="form form-inline" >
      <table class='table table-form'>
        <caption><?php echo $lang->user->modifyPassword;?></caption>
        <tr>
          <td><?php echo $lang->user->account;?></td>
          <td><?php echo $user->account;?></td>
        </tr>  
        <tr>
          <td><?php echo $lang->user->newPassword;?></td>
          <td><?php echo html::password('password1', '', "class='text-3'");?></td>
        </tr>  
        <tr>
          <td><?php echo $lang->user->password2;?></td>
          <td><?php echo html::password('password2', '', "class='text-3'");?></td>
        </tr>  
        <tr><td colspan='2' class='a-center'><?php echo html::submitButton() . html::resetButton();?></td></tr>
      </table>
    </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>