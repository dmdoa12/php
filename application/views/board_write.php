<form class="form-horizontal" action="/index.php/Board/insert" method="post">
	<?php { ?>
	<div class="modal-dialog modal-lg">
		<div class="modal-header">
			<h3>뉴스 토론 게시판</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="control-group">
					<input class="input-xlarge span12" id="focusedInput" name="boardTitle" type="text" placeholder="글 제목">
				</div>
				<div class="control-group">
					<textarea class="span12" rows="15" name="boardContent" placeholder="글 내용"></textarea>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary" type="submit">쓰기</button>
			<a href="/index.php/Board" class="btn">목록</a>
		</div>
	</div>
	<?php } ?>
</form>
