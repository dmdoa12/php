      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">회원가입</h3>
      </div>
      <form class="form-horizontal" method="post">
	      <div class="modal-body">
				<div class="row-fluid">
					<div class="control-group"> <input class="span12" type="text" id="id" name="id" placeholder="아이디"> </div>
		      		<div class="control-group">	<input class="span12" type="text" id="name" name="name" placeholder="이름"> </div>
		      		<div class="control-group">	<input class="span12" type="password" id="password" name="password" placeholder="비밀번호"> </div>
		      		<div class="control-group">	<input class="span12" type="password" id="password-confirm" name="password-confirm" placeholder="비밀번호 확인"> </div>
		      		<div class="control-group">	<input class="span12" type="text" id="email" name="email" placeholder="이메일"> </div>
		      		<div class="control-group">
		      			<select class="span12" id="quiz" name="quiz">
		      				<option>가장 친한 친구의 이름은?</option>
		      				<option>아버지의 이름은?</option>
		      				<option>자신이 졸업한 초등학교는?</option>
		      				<option>가장 좋아하는 음식은?</option>
		      			</select>
		      		</div>
		      		<div class="control-group">	<input class="span12" type="text" id="result" name="result" placeholder="퀴즈 정답"> </div>	
	      		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">가입</button>
	        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">취소</button>
	      </div>
      </form>