<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index(Request $req){
        
        // $emp = DB::select('select * from employees inner join deparments on employees.did = deparments.did');
        $search = $req['search'];
        $sort = $req['sort'] ?? "asc";

        $emp = DB::table('employees')->
        join('deparments','employees.did','=','deparments.did')->
        select('employees.*','deparments.dname','deparments.dlocation')
        ->where('name','like',"$search%")->orderBy('name',$sort)->get();

        return view('employee.index',compact('emp','search'));

    }

    public function insert(){

        $dp = DB::select('select * from deparments');

        return view('employee.insert')->with('dp',$dp);

    }

    public function store(Request $req){

       $result =  DB::insert('insert into employees(name,email,age,did) values(?,?,?,?)',[
            $req['name'],$req['email'],$req['age'],$req['dname']]);

            if($result){
                return redirect('/employee');
            }

            return redirect('/employee');

        }

        public function edit($id){

            $emp = DB::select('select * from employees where eid = ?',[$id]);

            // echo "<pre>";
            // print_r($emp);

            $dp = DB::select('select * from deparments');

            return view('employee.edit',compact('emp','dp'));
        }

        public function update(Request $req , $id){

            $emp = DB::select('select * from employees where eid = ?',[$id]);

            if(!is_null($emp)){

        $result =  DB::update("update employees set name = ? , email = ? , age = ? , did = ? where eid = ?",
            [$req['name'],$req['email'],$req['age'],$req['dname'],$id]);

            if($result){
                return redirect('/employee');
            }

            return redirect('/employee');


            }

        }
                
        public function delete($id){

            $emp = DB::select('select * from employees where eid = ?',[$id]);

            if(!is_null($emp)){

               $result =  DB::delete('delete from employees where eid = ?' , [$id]);

                if($result){
                        
                    return redirect('/employee');

                }

                return redirect('/employee');

            }
            
        }



}
