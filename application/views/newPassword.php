<div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">비밀번호 변경</h3>
  </div>
  <form class="form-horizontal" action="/index.php/Auth/pwModify" method="post">
    <div class="modal-body">
      <div class="row-fluid">
        <div class="control-group"> <input class="span12" type="password" id="new_passwd" name="new_passwd" placeholder="새 비밀번호"> </div>
        <div class="control-group"> <input class="span12" type="password" id="new_passwd_confirm" name="new_passwd_confirm" placeholder="새 비밀번호 확인"> </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">변경</button>
    </div>
  </form>
</div>