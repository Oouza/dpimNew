<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\typeCourse;
use App\Exports\TypeCourseExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminCourseController extends Controller
{    
    function typeCourse(){
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        return view('backend.course.typeCourse.typeCourse',compact('typeCourse'));
    }

    function typeCourseForm(){
        return view('backend.course.typeCourse.typeCourse-add');
    }

    function typeCourseAdd(Request $request){
        // dd($request);
        
        $typeCourse = new typeCourse;
        $typeCourse->tc_no = $request->course_no;
        $typeCourse->tc_name = $request->course_name;
        $typeCourse->tc_userCreate = Auth::user()->name;
        $typeCourse->tc_userUpdate = Auth::user()->name;
        $typeCourse->save();

        $mes = 'Success';
        $yourURL= url('backend/typeCourse');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function typeCourseEdit($id){
        $typeCourse = typeCourse::find($id);
        return view('backend.course.typeCourse.typeCourse-edit',compact('typeCourse'));
    }

    function typeCourseUpdate(Request $request, $id){
        // dd($request);

        $update = typeCourse::find($id)->update([
            'tc_no'         =>  $request->no,
            'tc_name'       =>  $request->name,
            'tc_userUpdate' =>  Auth::user()->name
        ]);

        $mes = 'Update Success';
        $yourURL= url('backend/typeCourse');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function typeCourseDel($id){
        // dd($request);

        $update = typeCourse::find($id)->update([
            'tc_userDelete' =>  Auth::user()->name
        ]);

        $mes = 'Delete Success';
        $yourURL= url('backend/typeCourse');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function typeCourseExport(){
        return Excel::download(new TypeCourseExport, 'TypeCourse.xlsx');
    }
}
