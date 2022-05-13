<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>考勤列表</title>
    <style>
        body,
        form,
        input {
            margin: 0;
            padding: 0;
            border: none;
        }

        h1 {
            text-align: center;
        }

        table {
            margin: auto;
            background-color: #DDDDDF;
        }

        td {
            font: 20px "微软雅黑";
            text-align: center;
        }

        form {
            text-align: center;
            border: 1px;
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
    <h1>考勤情况&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/close">退出</a></h1>
    <table>
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>签到时间</td>
            <td>修改</td>
            <td>删除</td>
        </tr>
        @foreach($list as $v)
        <tr>
            <td>{{$v -> account}}</td>
            <td>{{$v -> name}}</td>
            <td>{{$v -> date}}</td>
            <td><a href="/editStudent/{{$v->id}}">修改</a></td>
            <td><a href="/del/{{$v->id}}">删除</a></td>
        </tr>
        @endforeach
    </table>
    <form action="/clear" method="post">
        @csrf
        <input type="submit" value="课程结束，点击这里清除数据库">
    </form>

</body>

</html>