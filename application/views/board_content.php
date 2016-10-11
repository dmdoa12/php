
<?php { ?>
<div class="modal-dialog modal-lg">
  <div class="modal-header">
    <h5>제목:<?php echo $content->boardTitle;?></h5>
  </div>
  <div class="modal-body">
  	<p><?php echo $content->boardContent;?></p>
  	<pre> 글번호:<?php echo $content->boardNum;?>	작성일:<?php echo $content->boardDate;?>	작성자:<?php echo $content->id;?> </pre>
  </div>
  <div class="modal-footer">
    <?php if($this->session->userdata('id')==$content->id) { ?>
    <a href="/index.php/Board/modify/<?php echo $content->boardNum;?>" class="btn btn-primary">수정</a>
    <a href="/index.php/Board/delete/<?php echo $content->boardNum;?>" class="btn btn-danger">삭제</a>
    <a href="/index.php/Board" class="btn">목록</a>
    <?php } else { ?>
    <a href="/index.php/Board" class="btn">목록</a>
    <?php } ?>
  </div>
</div>
<form class="form-horizontal" action="/index.php/Comment/commentWrite/<?php echo $content->boardNum;?>" method="post">
  <div class="modal-body">
    <div class="row-fluid">
      <div class="control-group"> <input class="span12" type="text" id="comment" name="comment" placeholder="댓글 내용"> </div>
    </div>
    <span style="float:right">
      <div class="control-group"><button type="submit" class="btn btn-primary">작성</button></div>
    </span>

    <table class="table table-bordered">
      <!-- table head -->
      <thead>
        <tr>
          <td style="width:13%;">작성자</td>
          <td style="width:70%;">내용</td>
          <td style="width:17%;">작성일</td>
        </tr>
      </thead>
      <!-- table body -->
      <tbody>
        <?php foreach($comment_list as $lt) { ?>
        <!-- 댓글 수정 모드 -->
        <?php if($this->session->userdata('modifyStatus')==true) { ?>
        <tr>
        <th><?php echo $lt->id;?></th>
          <?php if($this->session->userdata('comment_id')==$lt->commentNum) { ?>
        <td style="word-break:break-all;"><input name="comment" type="text" style="width:95%;" value="<?php echo $lt->commentContent;?>"></input></a></td>
        <td><?php echo $lt->commentDate;?>&nbsp&nbsp&nbsp
        <i class="icon-ok" location.href='/index.php/Comment/modify/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>/?comment' style="cursor:pointer;"></i>
        <i class="icon-backward" onclick="location.href='/index.php/Comment/modifyCancel/<?php echo $content->boardNum;?>'" style="cursor:pointer;"></i></td>
        </form>
          <?php } else { ?>
        <td style="word-break:break-all;"><?php echo $lt->commentContent;?></a></td>
        <td><?php echo $lt->commentDate;?></td>
          <?php } ?>
        <!-- 수정 전 모드 -->
        </tr>
        <?php } else { ?>
          <tr>
          <th><?php echo $lt->id;?></th>
          <td style="word-break:break-all;"><?php echo $lt->commentContent;?></a></td>
          <td><?php echo $lt->commentDate;?>&nbsp&nbsp&nbsp
            <?php if($this->session->userdata('id')==$lt->id) { ?>
            <i class="icon-repeat" onclick="location.href='/index.php/Comment/commentModify/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>'" style="cursor:pointer;"></i>
            <i class="icon-remove" onclick="location.href='/index.php/Comment/commentRemove/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>'" style="cursor:pointer;"></i></td>
            <?php } ?>
          </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </form>
  <?php } ?>