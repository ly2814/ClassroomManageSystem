<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>编辑考勤</title>
	<style>
		body,
		form,
		input {
			margin: 0;
			padding: 0;
			border: none;
		}

		body {
			font-size: 15px;
		}

		.login {
			border: 2px solid #DDDDDD;
			width: 600px;
			margin: 100px auto;
			background-color: #DDDDDF;
		}

		.title {
			background-color: #666666;
			height: 50px;
			line-height: 50px;
			color: #EEF0F2;
			font-size: 20px;
			padding-left: 10px;
			text-align: center;
		}

		.items {
			height: 40px;
			margin-top: 20px;
		}

		.item1 {
			float: left;
			width: 170px;
			font-size: 20px;
			text-align: right;
			color: #003300;
		}

		.item2 {
			float: left;
			width: 420px;
		}

		.item3 {
			text-align: center;
		}

		.txt {
			width: 300px;
			height: 25px;
			background-color: #DDFDFF;
			border: 1px solid #000000;
		}

		.btn {
			width: 100px;
			height: 30px;
			background-color: #B5EDFE;
			color: #3590AC;
			border: 1px solid #3E92B0;
		}
	</style>
</head>

<body>
	<div class="login">
		<h2 class="title">编辑考勤信息</h2>
		<form action="/edit" method="post">
			@csrf
			<div class="item3"><input type="hidden" name="id" value="{{$student->id}}"></div>
			<div class="items">
				<div class="item1">姓名</div>
				<div class="item2"><input type="text" name="name" class="txt"></div>
			</div>
			<div class="items">
				<div class="item1">学号</div>
				<div class="item2"><input type="text" name="account" class="txt"></div>
			</div>
			<div class="item3"><input type="submit" value="编辑" class="btn"></div>
		</form>
	</div>
</body>

</html>