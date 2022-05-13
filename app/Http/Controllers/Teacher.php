<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teacher extends Controller
{
    function store(Request $request)
    {
        $input = $request->except('_token');
        $res = DB::table('teachers')->where('number','=',$input['account'])->first();
        // dd($res);
        $res_1 = DB::table('teachers')->where('password','=',$input['pwd'])->first();
        // dd($res_1);
        if ($res && $res_1 && strtolower($_REQUEST['authcode']) == $_SESSION['authcode']) {
            return view('admin');
            @$_SESSION['login'] = 1;
        } else {
            echo "<script>alert('登录失败,请检查账号或密码是否有错误')</script>";
            header("Refresh:3;url='/");
        }
    }
    function admin()
    {
        return view('admin');
    }
}
