
<?php { ?>
<div class="modal-dialog modal-lg">
  <div class="modal-header">
    <h3>제목:<?php echo $boardTitle;?></h3>
  </div>
  <div class="modal-body">
  	<p><?php echo $boardContent;?></p>
  	<pre> 글번호:<?php echo $boardNum;?>	작성일:<?php echo $boardDate;?>		작성자:<?php echo $id;?> </pre>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">닫기</a>
    <a href="#" class="btn btn-primary">변경사항 저장</a>
  </div>
</div>
<?php } ?>