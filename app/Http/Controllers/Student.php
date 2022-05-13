<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class Student extends Controller
{
    function listAdd(Request $request)
    {
        $input = $request->except('_token');
        $res1 = DB::table('students')->where('name', '=', $input['name'])->first();
        if (!isset($res1)) {
            DB::table('students')->insert(["account" => $input['number'], "name" => $input['name']]);
            echo "打卡成功，撒花hiahiahi啊,3秒后自动回到主页";
            header("Refresh:3;url='/'");
        } else {
            echo "该生已打卡,请勿重新打卡,3秒后自动回到主页";
            header("Refresh:3;url='/'");
        }
    }
    function list()
    {
        $res = DB::table('students')->get();
        return view('list', ['list' => $res]);
    }
    function editStudent($id)
    {
        $res = DB::table('students')->where("id", $id)->first();
        return view('editStudent', ['student' => $res]);
    }
    function edit(Request $request)
    {
        $id = $request->get('id');
        $account = $request->get('account');
        $name = $request->get('name');
        DB::table('students')->where('id', $id)->update(['account' => $account, 'name' => $name]);
        return redirect('/list');
    }
    function del($id)
    {
        $res = DB::table('students')->where('id', '=', $id)->delete();
        return redirect('/list');
    }
    function clear()
    {
        $close = DB::select("truncate table students;");
        return redirect('/admin');
    }
}
