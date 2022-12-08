<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index(){

        $emp = DB::select('select * from employees inner join deparments on employees.did = deparments.did');

        return view('employee.index')->with('emp',$emp);

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

        public function edit(){
            $dp = DB::select('select * from deparments');

            return view('employee.edit')->with('dp',$dp);
        }



}
