<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户中心</title>
    <style>
        body,
        form,
        input {
            margin: 0;
            padding: 0;
            border: none;
        }

        .login {
            border: 2px solid #DDDDDD;
            width: 600px;
            margin: 100px auto;
            background-color: #DDDDDF;
        }

        h1 {
            text-align: center;
        }

        .one {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION['authcode'])) {
        echo "<script>alert('请先登录')</script>";
        header("Refresh:1;url='/'");
        return view('welcome');
    }
    ?>
    <div class="login">
        <h1>登陆成功</h1>
        <div class="one"><a href="/list">考勤情况</a></div>
        <div class="one"><a href="/close">退出</a></div>
    </div>
</body>

</html>