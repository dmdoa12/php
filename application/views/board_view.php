<?php { ?>
<div class="modal-dialog modal-lg">
  <div class="modal-header">
    <h2>뉴스 토론 게시판에 오신걸 환영합니다.</h2>
  </div>
  <div class="modal-body">
    <table class="table table-hover table-bordered">
      <!-- table head -->
      <thead class="info">
        <tr>
          <td style="width:10%;">번호</td>
          <td style="width:65%;">제목</td>
          <td style="width:10%;">작성자</td>
          <td style="width:15%;">작성일</td>
        </tr>
        <thead>
          <!-- table body -->
          <tbody>
            <?php foreach($query as $lt) { ?>
            <tr onclick="location.href='/index.php/Board/view/<?php echo $lt->boardNum;?>'">
              <th><?php echo $lt->boardNum;?></th>
              <td><?php echo $lt->boardTitle;?></td>
              <td><?php echo $lt->id;?></td>
              <td><?php echo $lt->boardDate;?></td>
            </tr>
            <?php } ?>
          </tbody>
          <!-- table footer -->
        </table>

      <div class="row-fluid">
        <hr>
        <center><?php echo $pagination; ?></center>
      </div>
  </div>
      <div class="modal-footer">
        <div class="row-fluid">
          <span style="float:right">
            <button class="btn btn-primary" type="button" onclick="location.href='/index.php/Board/write'">글쓰기</button>
          </span>
        </div>
      </div>
  </div>
<?php } ?>