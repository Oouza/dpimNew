<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\typeCourse;
use App\Models\skills;
use App\Models\skillsSubs;
use App\Models\course;
use App\Models\courseSkills;
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

    function course(){
        $course = course::join('type_course','type_course.tc_id','courses.FKcou_typeCourse')->whereNull('cou_userDelete')->get();
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        // $pp = course::groupBy('cou_organizer')->get();
        $pp = DB::table('courses')->select('cou_organizer')->whereNull('cou_userDelete')->groupBy('cou_organizer')->get();
        $time = DB::table('courses')->select('cou_period')->whereNull('cou_userDelete')->groupBy('cou_period')->get();
        // dd(count($pp));
        return view('backend.course.course',compact('course','typeCourse','skills','skillsSubs','pp','time'));
    }

    function courseForm(){
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        return view('backend.course.course-add',compact('typeCourse','skills','skillsSubs'));
    }

    function courseAdd(Request $request){
        // dd($request);
        $tc = typeCourse::where('tc_id',$request->course_type)->first();
        $ss = skillsSubs::where('ss_id',$request->skills)->first();

        $course = new course;
        $course->cou_no             = $request->no;
        $course->cou_name	        = $request->couName;
        $course->cou_organizer      = $request->peopleName;
        $course->cou_startTime	    = $request->start;
        $course->cou_endTime	    = $request->end;
        $course->FKcou_typeCourse	= $request->course_type;
        $course->cou_nametypeCourse = $tc->tc_name;
        $course->cou_period	        = $request->period;
        $course->cou_frequency      = $request->frequency;
        $course->cou_detail	        = $request->detail;
        $course->cou_note	        = $request->course_note;
        $course->FKcou_userCreate   = 0;
        $course->cou_userCreate	    = Auth::user()->name;
        $course->cou_userUpdate     = Auth::user()->name;
        $course->save();

        $last = course::latest('cou_id')->first();

        $courseSkills = new courseSkills;
        $courseSkills->FKcs_skills	    = $request->skills;
        $courseSkills->cs_nameskills	= $ss->ss_name;
        $courseSkills->FKcs_course	    = $last->cou_id;
        $courseSkills->cs_namecourse	= $last->cou_name;
        $courseSkills->FKcs_userCreate  = 0;
        $courseSkills->cou_userCreate	= Auth::user()->name;
        $courseSkills->cou_userUpdate   = Auth::user()->name;
        $courseSkills->save();

        if($request->skills_other!=''){
            for($i = 0; $i < count($request->skills_other); $i++) {
                $indexedArray = array_values($request->skills_other); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $sSub = skillsSubs::find($value);

                $courseSkills = new courseSkills;
                $courseSkills->FKcs_skills	    = $value;
                $courseSkills->cs_nameskills	= $sSub->ss_name;
                $courseSkills->FKcs_course	    = $last->cou_id;
                $courseSkills->cs_namecourse	= $last->cou_name;
                $courseSkills->FKcs_userCreate  = 0;
                $courseSkills->cou_userCreate	= Auth::user()->name;
                $courseSkills->cou_userUpdate   = Auth::user()->name;
                $courseSkills->save();
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/course');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function courseEdit($id){
        $cou = course::find($id);
        $cs = courseSkills::where('FKcs_course',$id)->whereNull('cou_userDelete')->get();
        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        return view('backend.course.course-edit',compact('cou','cs','typeCourse','skills','skillsSubs'));
    }

    function courseUpdate(Request $request,$id){
        // dd($request);
        $course = course::find($id);
        $tc = typeCourse::where('tc_id',$request->typeCourse)->first();
        $ss = skillsSubs::where('ss_id',$request->skills)->first();

        $update = course::find($id)->update([
            'cou_no'                =>  $request->no,
            'cou_name'              =>  $request->nameCourse,
            'cou_organizer'         =>  $request->namePeople,
            'cou_startTime'         =>  $request->start,
            'cou_endTime'           =>  $request->end,
            'FKcou_typeCourse'      =>  $request->typeCourse,
            'cou_nametypeCourse'    =>  $tc->tc_name,
            'cou_period'            =>  $request->period,
            'cou_frequency'         =>  $request->frequency,
            'cou_detail'            =>  $request->detail,
            'cou_note'              =>  $request->course_note,
            'cou_userUpdate'        =>  Auth::user()->name,
        ]);

        // dd($update);

        if (!empty($request->conId)) {
            $conIdArray = array_values($request->conId);
            $skillsArray = array_values($request->skills);
        
            // ตรวจสอบว่าความยาวของอาร์เรย์เท่ากับหรือมากกว่า $i
            $arrayLength = count($conIdArray);
            for ($i = 0; $i < $arrayLength; $i++) {
                if (isset($conIdArray[$i]) && isset($skillsArray[$i])) {
                    $conId = $conIdArray[$i];
                    $skills = $skillsArray[$i];
        
                    $sSub = skillsSubs::find($skills);
        
                    $update = courseSkills::where('cs_id', $conId)->update([
                        'FKcs_skills' => $skills,
                        'cs_nameskills' => $sSub->ss_name,
                        'FKcs_course' => $id,
                        'cs_namecourse' => $course->cou_name,
                        'cou_userUpdate' => Auth::user()->name,
                    ]);
                } else {
                    // กระโดดข้ามหากไม่มีข้อมูลในดัชนีที่กำหนด
                    continue;
                }
            }
        }

        if($request->skills_other!=''){
            for($i = 0; $i < count($request->skills_other); $i++) {
                $indexedArray = array_values($request->skills_other); // เรียงลำดับค่าใหม่ให้เป็นอาร์เรย์ที่มีคีย์ต่อเนื่องกัน
                $value = $indexedArray[$i];
                $sSub = skillsSubs::find($value);

                $courseSkills = new courseSkills;
                $courseSkills->FKcs_skills	    = $value;
                $courseSkills->cs_nameskills	= $sSub->ss_name;
                $courseSkills->FKcs_course	    = $id;
                $courseSkills->cs_namecourse	= $course->cou_name;
                $courseSkills->FKcs_userCreate  = 0;
                $courseSkills->cou_userCreate	= Auth::user()->name;
                $courseSkills->cou_userUpdate   = Auth::user()->name;
                $courseSkills->save();
            }
        }

        $mes = 'Success';
        $yourURL= url('backend/course');
        echo ("<script>alert('$mes'); location.href='$yourURL'; </script>");
    }

    function courseDelete($id){
        $update = course::find($id)->update([
            'cou_userDelete' =>  Auth::user()->name
        ]);
    }

    function courseFormFile(){
        return view('backend.course.course-file');
    }

    function courseSkillsDelete($id){
        $update = courseSkills::find($id)->update([
            'cou_userDelete' =>  Auth::user()->name
        ]);
    }

    function resultCourse(Request $request){
        $Sskills = $request->skills;
        $type = $request->course;
        $people = $request->people;
        $Stime = $request->time;
        
        // $course = courseSkills::join('courses','courses.cou_id','course_skills.FKcs_course')
        //     ->join('type_course','type_course.tc_id','courses.FKcou_typeCourse')
        //     ->when(!empty($skills), function ($query) use ($skills) { $query->where('FKcs_skills', $skills);})
        //     ->when(!empty($type), function ($query) use ($type) { $query->where('FKcou_typeCourse', $type); })
        //     ->when(!empty($people), function ($query) use ($people) { $query->where('cou_organizer', $people); })
        //     ->when(!empty($Stime), function ($query) use ($Stime) { $query->where('cou_period', $Stime); })
        //     ->whereNull('course_skills.cou_userDelete')
        //     ->whereNull('courses.cou_userDelete')
        //     ->select('course_skills.FKcs_course', 'courses.cou_id', DB::raw('MAX(courses.cou_no) as cou_no')) // เพิ่มคอลัมน์ที่ต้องการดึงข้อมูล
        //     ->groupBy('course_skills.FKcs_course', 'courses.cou_id')
        //     ->get();
            // ->select('courses.cou_id', 'courses.cou_no', 'courses.cou_name', 'courses.cou_organizer', 'courses.cou_period',
            // 'courses.cou_frequency', 'type_course.tc_name', 'course_skills.FKcs_course')

            $course = course::join('type_course', 'type_course.tc_id', 'courses.FKcou_typeCourse')
            ->leftjoin('course_skills', 'course_skills.FKcs_course', 'courses.cou_id')
            ->when(!empty($Sskills), function ($query) use ($Sskills) { $query->where('FKcs_skills', $Sskills); })
            ->when(!empty($type), function ($query) use ($type) { $query->where('FKcou_typeCourse', $type); })
            ->when(!empty($people), function ($query) use ($people) { $query->where('cou_organizer', $people); })
            ->when(!empty($Stime), function ($query) use ($Stime) { $query->where('cou_period', $Stime); })
            ->whereNull('course_skills.cou_userDelete')
            ->whereNull('courses.cou_userDelete')
            ->select(
                'course_skills.FKcs_course',
                'courses.cou_id',
                'type_course.tc_id', // เพิ่มคอลัมน์ที่ต้องการจาก type_course
                DB::raw('MAX(courses.cou_no) as cou_no'),
                DB::raw('MAX(courses.cou_name) as cou_name'),
                DB::raw('MAX(courses.cou_organizer) as cou_organizer'),
                DB::raw('MAX(courses.cou_period) as cou_period'),
                DB::raw('MAX(courses.cou_frequency) as cou_frequency'),
                DB::raw('MAX(type_course.tc_name) as tc_name'),
            )
            ->groupBy(
                'course_skills.FKcs_course',
                'courses.cou_id',
                'type_course.tc_id', // เพิ่มคอลัมน์ที่ต้องการจาก type_course
            )
            ->get();

        $typeCourse = typeCourse::whereNull('tc_userDelete')->get();
        $skills = skills::join('capacities','capacities.cc_id','skills.FKs_capacity')->where('FKs_Create',0)->whereNull('s_userDelete')->get();
        $skillsSubs = skillsSubs::where('FKss_Create',0)->whereNull('ss_userDelete')->get();
        // $pp = course::groupBy('cou_organizer')->get();
        $pp = DB::table('courses')->select('cou_organizer')->whereNull('cou_userDelete')->groupBy('cou_organizer')->get();
        $time = DB::table('courses')->select('cou_period')->whereNull('cou_userDelete')->groupBy('cou_period')->get();
        // dd(count($pp));
        return view('backend.course.course',compact('course','typeCourse','skills','skillsSubs','pp','time','Sskills','type','people','Stime'));
    }
}
