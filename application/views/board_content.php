
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
        <td style="width:15%;">작성자</td>
        <td style="width:70%;">내용</td>
        <td style="width:15%;">작성일</td>
      </tr>
    </thead>
    <!-- table body -->
    <tbody>
      <?php foreach($comment_list as $lt) { ?>
        <th><?php echo $lt->id;?></th>
        <td style="word-break:break-all;"><?php echo $lt->commentContent;?></a></td>
        <td><?php echo $lt->commentDate;?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</form>
<?php } ?>