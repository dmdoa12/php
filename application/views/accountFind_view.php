
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h3>계정 찾기</h3>
</div>
<div class="modal-body">
  <div class="row-fluid">
    <div class="span12">
      <button class="btn btn-primary btn-block" data-toggle="modal" href="#id_find">아이디 찾기</button>
    </div>
  </div>
  <br>
  <div class="row-fluid">
    <div class="span12">
      <button class="btn btn-primary btn-block" data-toggle="modal" href="#pw_find">비밀번호 찾기</button>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" data-dismiss="modal" class="btn btn-danger">취소</button>
</div>

<!-- 아이디 찾기 -->
<div id="id_find" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>아이디 찾기</h3>
  </div>
  <form class="form-horizontal" action="/index.php/Auth/idFind" method="post">
    <div class="modal-body">
      <div class="row-fluid">
        <div class="control-group"><p><input type="text" class="span12" id="name" name="name" placeholder="이름"></p></div>
        <div class="control-group"><p><input type="text" class="span12" id="email" name="email" placeholder="이메일"></p></div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">찾기</button>
      <button type="button" data-dismiss="modal" class="btn btn-danger">취소</button>
    </div>
  </div>
</form>

<!-- 비밀 번호 찾기 -->

<div id="pw_find" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>비밀번호 찾기</h3>
  </div>
  <form class="form-horizontal" action="/index.php/Auth/pwFind" method="post">
    <div class="modal-body">
      <div class="row-fluid">
              <div class="control-group"> <input class="span12" type="text" id="id" name="id" placeholder="아이디"> </div>
              <div class="control-group">
                <select class="span12" id="quiz" name="quiz">
                  <option value=1>가장 친한 친구의 이름은?</option>
                  <option value=2>아버지의 이름은?</option>
                  <option value=3>자신이 졸업한 초등학교는?</option>
                  <option value=4>가장 좋아하는 음식은?</option>
                </select>
              </div>
              <div class="control-group"> <input class="span12" type="text" id="result" name="result" placeholder="퀴즈 정답"> </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">찾기</button>
      <button type="button" data-dismiss="modal" class="btn btn-danger">취소</button>
    </div>
</div>
</form>

