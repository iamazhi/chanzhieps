<?php include '../../common/view/header.admin.html.php'; ?>
<table class='table table-hover table-bordered table-striped'>
  <?php $config->requestType = 'PATH_INFO';?>
  <caption>
    <div class='f-left'><?php echo $lang->forum->threadList;?></div>
  </caption>
  <thead>
    <tr class='a-center'>
      <th><? echo $lang->thread->title;?></th>
      <th><?php echo $lang->thread->author;?></th>
      <th><?php echo $lang->thread->postedDate;?></th>
      <th><?php echo $lang->thread->views;?></th>
      <th><?php echo $lang->thread->replies;?></th>
      <th><?php echo $lang->thread->lastReply;?></th>
    </tr>  
  </thead>
  <tbody>
    <?php foreach($threads as $thread):?>
    <tr class='a-center'>
      <td class='a-left'>
        <?php
        $iconRoot = $themeRoot . 'default/images/forum/';
        $thread->isNew ? print(html::image($iconRoot . 'threadnew.gif')) : print(html::image($iconRoot . 'threadcommon.gif'));
        ?>
        <?php echo html::a($this->createLink('thread', 'view', "id=$thread->id"), $thread->title, '_blank');?></td>
      <td class='w-50px'><?php echo $thread->author;?></td>
      <td class='w-100px'><?php echo substr($thread->addedDate, 5, -3);?></td>
      <td class='w-30px'><?php echo $thread->views;?></td>
      <td class='w-30px'><?php echo $thread->replies;?></td>
      <td class='w-150px'><?php if($thread->replies) echo substr($thread->lastRepliedDate, 5, -3) . ' ' . $thread->lastRepliedBy;?></td>  
    </tr>  
    <?php endforeach;?>
  </tbody>
  <?php $config->requestType = 'GET';?>
  <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
</table>
<?php include '../../common/view/footer.admin.html.php'; ?>