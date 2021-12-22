<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
class ApiController extends Controller
{
    public function index(){
        return Student::all();
    }
    public function create(Request $request){
        $students = new Student();
        $students->fname= $request ->input('fname');
        $students->lname= $request ->input('lname');
        $students->email= $request ->input('email');
        $students->password= $request ->input('password');
        $students->save();
        return response()->json($students);
    }
    public function show(Student $student){
        return $student;
    }
    public function update(Request $request, $id){
        $students = Student::find($id);
        if($students){
            $students->fname= $request ->input('fname');
            $students->lname= $request ->input('lname');
            $students->email= $request ->input('email');
            $students->password= $request ->input('password');
            $students->save;
            return response()->json(['message'=>'Product Added Successfull'],200);

        }else{
            return response()->json(['message'=>'No Product Found'], 404);
        }
       
    }
    
    public function destroy(Student $student){
        $student->delete();
    }
}
