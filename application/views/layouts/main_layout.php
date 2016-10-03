<html>
<header>
	<style type="text/css">
	body{
		margin     : 0px;
		background : #FF00FF;
	}
	.wrapper{
		margin     : 0 auto;
		width      : auto;
		height     : 900px;
	}
	.header{
		width      : 95%;
		height     : 10%;
		background : #F0F0F0;
		border     : 1px solid #CCC;
		margin     : 5px auto;
	}
	.content{
		width      : 95%;
		height     : 90%;
		background : #F0F0F0;
		border     : 1px solid #CCC;
		margin     : 5px auto;
	}
	</style>

</header>
<body>
	<div class = "wrapper">
		<div class = "header">
			<img src="asset/images/logo.jpg">
		</div>
		<div class = "content">
			{yield}
		</div>
	</div>
</body>
<html>