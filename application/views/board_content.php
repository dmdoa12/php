
<?php { ?>
<div class="modal-dialog modal-lg">

  <div class="modal-header">
    <h5>제목:<?php echo $content->boardTitle;?></h5>
  </div>

  <div class="modal-body">
  	<p><?php echo $content->boardContent;?></p>
  	<pre>글번호:<?php echo $content->boardNum;?>	작성일:<?php echo $content->boardDate;?>	작성자:<?php echo $content->id;?></pre>
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
<!-- 댓글 작성 폼 -->
<form class="form-horizontal" action="/index.php/Comment/commentWrite/<?php echo $content->boardNum;?>" method="post">

  <div class="modal-body">

    <div class="row-fluid">
      <div class="control-group"> 
        <input class="span12" type="text" id="comment" name="comment" placeholder="댓글 내용"> 
      </div>
    </div>

    <span style="float:right">
      <div class="control-group"><button type="submit" class="btn btn-primary">작성</button></div>
    </span>

</form>
<!-- 댓글 출력 테이블 -->
    <table class="table table-bordered">

      <!-- table head -->
      <thead>
        <tr>
          <td style="width:7%;">작성자</td>
          <td style="width:70%;">내용</td>
          <td style="width:22%;">작성일</td>
        </tr>
      </thead>

      <!-- table body -->
      <tbody>
  <?php foreach($query as $lt) { ?>
        <!-- 댓글 수정 모드 -->
        <?php if($this->session->userdata('modifyStatus')==true) { ?>
    <tr>
        <th><?php echo $lt->id;?></th>
          <?php if($this->session->userdata('comment_id')==$lt->commentNum) { ?>
      <!-- 댓글 수정 폼 -->
      <form class="form-horizontal" action="/index.php/Comment/modify/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>" method="post">

              <td style="word-break:break-all;">
                <input name="commentContent" type="text" style="width:95%;" value="<?php echo $lt->commentContent;?>">
                </input>
              </td>

              <td><?php echo $lt->commentDate;?>&nbsp&nbsp&nbsp
                <button class="btn" type="submit">
                  <i class="icon-ok" style="cursor:pointer;"></i>
                </button>
              </td>

      </form>
      <!-- 댓글 수정 취소 버튼 -->
      <a href="/index.php/Comment/modifyCancel/<?php echo $content->boardNum;?>" class="btn">
        <i class="icon-backward"></i>
      </a>
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
                <a href="/index.php/Comment/commentModify/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>" class="btn">
                  <i class="icon-repeat"></i>
                </a>
                <a href="/index.php/Comment/commentRemove/<?php echo $content->boardNum;?>/<?php echo $lt->commentNum?>" class="btn">
                  <i class="icon-trash"></i>
                </a>
            <?php } ?>
            
          </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    <div>
      <?php echo $pagination; ?>
    </div> 
  <?php } ?><!-- foreach 종료 -->