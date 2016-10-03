<html>
<header>
	<style type="text/css">
		body{
			margin     : 5px;
		}
		.wrapper{
			width      : auto;
			height     : 930px;
			border: 1px solid #000;
			border-radius: 20px;
		}
		.header{
			width      : 100%;
			height     : 20%;
			background : #FFFFFF;
			margin     : 0px auto;
			position   : relative;

			border-top-left-radius  : 20px;
			border-top-right-radius : 20px;
		}
		.header-bar{
			float      : right;
			width      : 50%;
			text-align: right;
			margin:10px;
		}
		.content{
			width      : 100%;
			height     : 80%;
			background : #F0F0F0;
			margin     : 0px auto;
			background-image: url("asset/images/main.jpg");
			background-size: cover;
			position   : relative;

			border-bottom-left-radius  : 20px;
			border-bottom-right-radius : 20px;
		}
		.welcome{
			  position:absolute;
			  top:0;right:0;bottom:0;left:0;
			  display:flex;
			  align-items:center;
			  justify-content:center;

			  display:-webkit-flex;
			  -webkit-align-item;center;
			  -webkit-justify-content:center;

		}
		.welcomeContent{
			background-color: rgba( 255, 255, 255, 0.5 );
			width:700px;
			height: 400px;
			border-radius: 20px;
		}
		.image{
			top : 10%;
			position : absolute;
		}
	</style>

</header>
<body>
	<div class = "wrapper">
		<div class = "header">
			<img class="image" src="asset/images/logo.png">
			<div class="header-bar">
				<a>로그인</a>
				|
				<a>회원가입</a>
				|
				<a>id/pw 찾기</a>
			</div>
		</div>
		<div class = "content">
			<div class="welcome">
				<div class="welcomeContent">
					<h1> {yield} </h1>
				</div>
			</div>
		</div>
	</div>
</body>
<html>