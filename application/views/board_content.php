
<?php { ?>
<div class="modal-dialog modal-lg">
  <div class="modal-header">
    <h5>제목:<?php echo $boardTitle;?></h5>
  </div>
  <div class="modal-body">
  	<p><?php echo $boardContent;?></p>
  	<pre> 글번호:<?php echo $boardNum;?>	작성일:<?php echo $boardDate;?>	작성자:<?php echo $id;?> </pre>
  </div>
  <div class="modal-footer">
  <?php if($this->session->userdata('id')==$id) { ?>
    <a href="/index.php/Board/modify/<?php echo $boardNum;?>" class="btn btn-primary">수정</a>
    <a href="/index.php/Board/delete/<?php echo $boardNum;?>" class="btn btn-danger">삭제</a>
    <a href="/index.php/Board" class="btn">목록</a>
  <?php } else { ?>
    <a href="/index.php/Board" class="btn">목록</a>
  <?php } ?>
  </div>
</div>
<?php } ?>