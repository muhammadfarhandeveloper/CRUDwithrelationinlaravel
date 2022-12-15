<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    
    public function index(){

        $st = Student::all(); 
    
        return view('student.index')->with('st',$st);
    }

    public function insert(){

        return view('student.insert');
    }

    public function store(Request $req){

        $req->validate([

            'name' => 'required',
            'fname' => 'required',
            'age' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'img' => 'required'
        ]);
        
        $img = $req['img'];
        $name = $img->getClientOriginalName();
        $img->move('images',$name);

        Db::table('students')->insert([

            'stname' => $req['name'],
            'stfname' => $req['fname'],
            'age' => $req['age'],
            'img' => $name,
            'email' => $req['email'],
            'password' => md5($req['password'])
        ]);
        

        return redirect('/student');

    }

    public function delete($id){

        $st1 = Student::find($id);
        
        if(!is_null($st1)){
            
            unlink('images/'.$st1->img);

            Db::table('students')->where('stid',$id)->delete();
            
            return redirect('/student');
            
        }

        return redirect('/student');

    }

    public function edit($id){

        $st = Student::find($id);

    
        if(!is_null($st)){

            return view('student.edit')->with('st',$st);
        }

        return redirect('/student');

    }
    public function update(Request $req,$id){

        $st = Student::find($id);

        if(!is_null($st)){

            if($req['img'] != null){

                $img = $req['img'];
                $imgname = $img->getClientOriginalName();
                $img->move('images',$imgname);
                unlink('images/'.$req['oldimg']);
                
            }
            else{
                $imgname = $req['oldimg'];
            }


        $st = Db::table('students')->where('stid',$id)->update([
                
            'stname' => $req['name'],
            'stfname' => $req['fname'],
            'age' => $req['age'],
            'img' => $imgname,
            'email' => $req['email']
        ]);

            return redirect('/student');
        }

        return redirect('/student');

    }


}
