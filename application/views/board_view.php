<table class="table">
  <thead>
    <tr>
      <th>번호</th>
      <th>제목</th>
      <th>작성자</th>
      <th>작성일</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $lt) { ?>
    <tr>
      <th><?php echo $lt->boardNum;?></th>
      <td><?php echo $lt->boardTitle;?></a></td>
      <td><?php echo $lt->id;?></td>
      <td><?php echo $lt->boardDate;?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th><?php echo $pagination;?></th>
    </tr>
  </tfoot>
</table>

