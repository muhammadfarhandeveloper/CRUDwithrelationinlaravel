<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DepartmentController extends Controller
{

    public function index(){

    //    $dp =  Department::all();  ORM 

    //    $dp =  DB::select('select * from deparments');

           $dp =  Department::all();

        //    print_r(DB::table('deparments')->where('dname','like','%a%')->orWhere('did',5)->get());
        //    print_r(DB::table('deparments')->whereIn('dname',['admin','hr'])->get());



        return view('department.index')->with('dp',$dp); 
    }

    public function insert(){

        return view('department.insert');
    }

    public function store(Request $req){

        // DB::insert("insert into deparments(dname,dlocation) values($req[dname],$req[dlocation])");
      $result =  DB::insert("insert into deparments(dname,dlocation) values(?,?)",[$req['dname'],$req['dlocation']]);

      if($result > 0){
        session()->flash('status','Data Inserted');
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
            session()->flash('status','Data Updated');

            return redirect('/department');
        }

            return redirect('/department');

    }


    public function trashdata(){

        $dp = Department::onlyTrashed()->get();

        return view('department.index-trash')->with('dp',$dp);

    }

    public function deleteper($id){

        $dp = Department::onlyTrashed()->find($id);

        if(!is_null($dp)){

            $dp->forceDelete();
                
                return redirect('/department');
        } 

    }
    
    public function restore($id){

        $dp = Department::withTrashed()->find($id);

        if(!is_null($dp)){

            $dp->restore();

            return redirect('/department');
        }

    }




    public function delete($id){

        $dp = Department::find($id);

        if(!is_null($dp)){
            session()->flash('status1','Data Deleted');
            
            $dp->delete();
                
                return redirect('/department');
            
        }

        return redirect('/department');

    }

}
