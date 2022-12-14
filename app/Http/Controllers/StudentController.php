<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentMark;
use App\Models\Term;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_details = Student::select('teachers.name as teachername','students.*')->leftjoin('teachers','teachers.id','=','students.reporting_teacher')->get();
        $teachers = Teacher::get();
        return view('student.list',compact('student_details','teachers')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('student.add',compact('teachers')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'InputName' => 'required|regex:/^[a-zA-Z0-9 ]+$/i|string|min:3|max:250',
            'InputAge' => 'required',
            'InputGender' => 'required',
            'InputTeacher' => 'required',
        ], [
            'InputName.required' => 'Name required',
            'InputName.regex' => 'Only alphabets numbers and Spaces allowed',
            'InputAge.required' => 'Age is required',
            'InputGender.required' => 'Gender is required',
            'InputTeacher.required' => 'Reporting is required',

        ]);
        try {
                $student = new Student();
                $student->name = $request->InputName;
                $student->age = $request->InputAge ;
                $student->gender = $request->InputGender;
                $student->reporting_teacher = $request->InputTeacher;
                $student->save();
                
                return redirect()->route('admin.student.index')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return view('student.edit',compact('data')) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'InputName' => 'required|regex:/^[a-zA-Z0-9 ]+$/i|string|min:3|max:250',
            'InputAge' => 'required',
            'InputGender' => 'required',
            'InputTeacher' => 'required',
        ], [
            'InputName.required' => 'Name required',
            'InputName.regex' => 'Only alphabets numbers and Spaces allowed',
            'InputAge.required' => 'Age is required',
            'InputGender.required' => 'Gender is required',
            'InputTeacher.required' => 'Reporting is required',

        ]);
        try {
                $student = Student::find($request->InputId);
                $student->name = $request->InputName;
                $student->age = $request->InputAge ;
                $student->gender = $request->InputGender;
                $student->reporting_teacher = $request->InputTeacher;
                $student->save();
                
                return redirect()->route('admin.student.index')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        StudentMark::where('student_id','=',$id)->delete();
        // return redirect()->back();
        return back()->with('success','Deleted successfully.');
    }


    public function studentMarklist()
    {
        // $students = Student::get();
        $term = Term::get();
        $student_mark = StudentMark::select('terms.name as term_name','student_marks.*')
        ->leftjoin('terms','terms.id','=','student_marks.term')->get();
        return view('student_mark.list',compact('student_mark','term')) ;
    }

    public function createMark()
    {
        $students = Student::get();
        $term = Term::get();
        return view('student_mark.add',compact('students','term')) ;
    }


    public function markStore(Request $request)
    {
        $validated = $request->validate([
            'InputName' => 'required',
            'InputTerm' => 'required',
            'InputMaths' => 'required',
            'InputScience' => 'required',
            'InputHistory' => 'required',
        ], [
            'InputName.required' => 'Name required',
            'InputTerm.required' => 'Term is required',
            'InputMaths.required' => 'Maths mark is required',
            'InputScience.required' => 'Science mark is required',
            'InputHistory.required' => 'History mark is required',

        ]);
        try {
                $marks = new StudentMark();
                $marks->student_id = $request->InputName;
                $marks->term = $request->InputTerm;
                $marks->maths = $request->InputMaths;
                $marks->science = $request->InputScience;
                $marks->history = $request->InputHistory;
                $marks->save();
                
                return redirect()->route('admin.student_marklist')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
        }
    }
    public function markDestroy($id)
    {
        StuStudentMarkdent::find($id)->delete();
        // return redirect()->back();
        return back()->with('success','Deleted successfully.');
    }

    public function studentMarkupdate(Request $request)
    {

        $validated = $request->validate([
            'InputName' => 'required',
            'InputTerm' => 'required',
            'InputMaths' => 'required',
            'InputScience' => 'required',
            'InputHistory' => 'required',
        ], [
            'InputName.required' => 'Name required',
            'InputTerm.required' => 'Term is required',
            'InputMaths.required' => 'Maths mark is required',
            'InputScience.required' => 'Science mark is required',
            'InputHistory.required' => 'History mark is required',

        ]);
        try {
                $marks = StudentMark::find($request->InputId);
                $marks->student_id = $request->InputName;
                $marks->term = $request->InputTerm;
                $marks->maths = $request->InputMaths;
                $marks->science = $request->InputScience;
                $marks->history = $request->InputHistory;
                $marks->save();
                
                return redirect()->route('admin.student_marklist')->with('success','Added successfully.');
        }catch (\Exception $e) {
            
            return back()->with('error','somethingwrong');
        }
    }
}
