  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">로그인</h3>
  </div>
  <form class="form-horizontal" action="index.php/Auth/authantication" method="post">
    <div class="modal-body">
      <div class="row-fluid">
        <div class="control-group"> <input class="span12" type="text" id="id" name="id" placeholder="아이디"> </div>
        <div class="control-group"> <input class="span12" type="password" id="password" name="password" placeholder="비밀번호"> </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">로그인</button>
      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">취소</button>
    </div>
  </form>