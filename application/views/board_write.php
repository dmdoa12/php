<form class="form-horizontal" action="/index.php/Board/insert" method="post">
	
	<div class="row-fluid">
		<div class="control-group">
			<input class="input-xlarge span12" id="focusedInput" name="boardTitle" type="text" placeholder="글 제목">
		</div>
		<div class="control-group">
			<textarea class="span12" rows="15" name="boardContent" placeholder="글 내용"></textarea>
		</div>
	</div>
	<span style="float:right">
		<button class="btn btn-primary" type="submit">쓰기</button>
		<button class="btn btn-danger"  type="button">취소</button>
	</span>
</form>