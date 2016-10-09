<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>뉴스 토론 게시판</title>
	<link href="/asset/css/main.css" rel="stylesheet">	
	<!--bootstrap import-->
	<link href="/asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	<link href="/asset/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<!--sweetalert import-->
	<link href="/asset/lib/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" >
	<script src="/asset/lib/sweetalert-master/dist/sweetalert.min.js"></script> 
</head>
<body>
	<!-- alter창 컨트롤 -->
	<?php if($this->session->flashdata('message')){ ?>

		<script>
			swal('<?=$this->session->flashdata('message')?>','','error');
		</script>
	
	<?php } else if($this->session->flashdata('success')){ ?>
	
		<script>
			swal('<?=$this->session->flashdata('success')?>','','success');
		</script>
	
	<?php } ?>
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
						 <em><strong><?=$this->session->userdata('id')?>님 환영합니다</strong></em>
						 &nbsp;&nbsp;&nbsp;
						<a class="btn btn-primary" href="/index.php/Auth/logout">로그아웃</a>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<!-- 메인 그리드 -->
	<div class="container-fluid">
