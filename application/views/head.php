<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>뉴스 토론 게시판</title>
	<link href="/asset/css/main.css" rel="stylesheet">	
	<link href="/asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	<link href="/asset/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/asset/lib/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" >
	<script src="/asset/lib/sweetalert-master/dist/sweetalert.min.js"></script> 
</head>
<body>

	<?php if($this->session->flashdata('message')){ ?>

		<script>
			swal('<?=$this->session->flashdata('message')?>','','error');
		</script>
	
	<?php } else if($this->session->flashdata('success')){ ?>
	
		<script>
			swal('<?=$this->session->flashdata('success')?>','','success');
		</script>
	
	<?php } ?>
	<!-- 모달 -->
	<div class="modal hide fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<?php $this->load->view("login_view"); ?>
	</div>
	<div class="modal hide fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<?php $this->load->view("register_view"); ?>
	</div>
	<div id="accountModal" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
				<?php $this->load->view("accountFind_view");?>
	</div>
	<!--네비 -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!-- Be sure to leave the brand out there if you want it shown -->
				<a class="brand" href="#">뉴스 토론 게시판</a>
				<!-- Everything you want hidden at 940px or less, place within here -->
				<div class="nav-collapse collapse">
					<!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav nav-pills pull-right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">로그인</button>
						&nbsp;
						<button class="btn btn-primary" data-toggle="modal" data-target="#regiModal">회원가입</button>
						&nbsp;
						<button class="btn btn-primary" data-toggle="modal" data-target="#accountModal">id/pw찾기</button>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<!-- 메인 그리드 -->
	<div class="container-fluid" style="position:relative;">
