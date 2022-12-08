<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DepartmentController extends Controller
{

    public function index(){

    //    $dp =  Department::all();  ORM 

       $dp =  DB::select('select * from deparments');

        return view('department.index')->with('dp',$dp); 
    }

    public function insert(){

        return view('department.insert');
    }

    public function store(Request $req){

        // DB::insert("insert into deparments(dname,dlocation) values($req[dname],$req[dlocation])");
      $result =  DB::insert("insert into deparments(dname,dlocation) values(?,?)",[$req['dname'],$req['dlocation']]);

      if($result > 0){
        return redirect('/department');
      }
      else{
        return redirect('/department/insert');
      }

    }

    public function edit($id){

        // $dp = Department::find($id);

        // DB::select('select * from deparments where did = ?',[$id]);
        $dp = DB::select("select * from deparments where did = $id");

        // echo "<pre>";
        // print_r($dp[0]);
        return view('department.edit')->with('dp',$dp[0]);


    }

    public function update(Request $req,$id){

        // DB::update('update deparments set dname = ? , dlocation = ? where did = ?',[$req['dname'],$req['dlocation'],$id]);
        $result = DB::update("update deparments set dname = '$req[dname]' , dlocation = '$req[dlocation]' where did = $id ");

        if($result){
            return redirect('/department');
        }

        return back();

    }
    public function delete($id){

        $dp = DB::select("select * from deparments where did = $id");

        if(!is_null($dp)){

            $result = DB::delete('delete from deparments where did = ?',[$id]);

            if($result){
                return redirect('/department');
            }
        }

        return redirect('/department');

    }

}
