<form class="form-horizontal" action="/index.php/Board/boardmodify/<?php echo $boardNum;?>" method="post">
	<?php { ?>
	<div class="modal-dialog modal-lg">
		<div class="modal-header">
			<h3>뉴스 토론 게시판</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="control-group">
					<input class="input-xlarge span12" id="focusedInput" name="boardTitle" type="text" value="<?php echo $boardTitle;?>">
				</div>
				<div class="control-group">
					<textarea class="span12" rows="15" name="boardContent"><?php echo $boardContent;?></textarea>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary" type="submit">수정</button>
			<a href="/index.php/Board/view/<?php echo $boardNum;?>" class="btn btn-danger">취소</a>
		</div>
	</div>
	<?php } ?>
</form>
