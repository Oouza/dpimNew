<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //     return view('home');
        
        if(\Auth::user()->status == '1' || \Auth::user()->status == '2' ){  // แอดมินน
            return view('backend.graph.graph-job');
        }
        else if(\Auth::user()->status == '8' ){  // บุคลากร
            $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
            return view('frontend.person.indexUser',compact('user'));
        }
        else if(\Auth::user()->status == '7'){  // บุคลากร
            $user = User::join('employees','employees.FKe_userid','users.id')->find(\Auth::user()->id);
            $provinces = DB::table('provinces')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
            $amphures = DB::table('amphures')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
            $districts = DB::table('districts')->orderByRaw("CONVERT(name_th USING tis620) asc")->get();
            return view('frontend.person.userHistory',compact('user','provinces','amphures','districts'));
        }else if(\Auth::user()->status == '3' ||\Auth::user()->status == '5'){  // HR+Manager
            $id = \Auth::user()->id;
            $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
            ->join('companies','companies.c_id','ceohrs.FKch_company')
            ->join('provinces','provinces.id','companies.FKc_provinces')
            ->where('users.id',$id)->first();
            // dd($user->ch_note);

            if($user->ch_position=='HR'){
                return view('frontend.company.userHistory',compact('user'));
            }else if($user->ch_position=='ผู้บริหาร'){
                return view('frontend.manager.companySetting',compact('user'));
            }
        }else if(\Auth::user()->status == '4'){  // HR+Manager
            $user = User::join('ceohrs','ceohrs.FKch_userid','users.id')
            ->join('companies','companies.c_id','ceohrs.FKch_company')
            ->join('provinces','provinces.id','companies.FKc_provinces')
            ->where('users.id',\Auth::user()->id)->first();
            // dd($user->ch_position);

            if($user->ch_position=='HR'){
                return view('frontend.company.job.indexCompany',compact('user'));
            }else if($user->ch_position=='ผู้บริหาร'){
                return view('frontend.manager.scoreboard.indexManager',compact('user'));
            }
        }else{
            \Auth::logout();
            return redirect('/login')->with('message', 'You have been logged out.');
        }
        
    }
}
