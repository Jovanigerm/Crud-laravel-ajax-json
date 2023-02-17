<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }
    public function fetchstudents(){
        $students = Student ::all();
        return response()->json([
            'students'=>$students,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:19',
            'email'=>'required|email|max:191',
            'phone'=>'required|min:10|max:10',
            'course'=>'required|max:191',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $student = new Student;
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->course = $request->input('course');
            $student->save(); 
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully',
            ]);
        }
    }
    public function edit($id)
    {
        $student = Student::find($id);
        if($student)
        {
            return response()->json([
                'status'=>200,
                'student'=>$student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Student Not Found',
            ]);
        }
    }
    public function update (Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:19',
            'email'=>'required|email|max:191',
            'phone'=>'required|min:10|max:10',
            'course'=>'required|max:191',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $student = Student::find($id);
                if($student)
            {
                $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->phone = $request->input('phone');
                $student->course = $request->input('course');
                $student->update(); 
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Updated  Successfully',
                ]);
                }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Student Not Found',
                ]);
            }
        }
    }
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Student deleted Successfully',
        ]);

    }
}