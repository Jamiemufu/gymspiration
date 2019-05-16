<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    /**
     * __construct only role admin
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * index - return stats for dash
     *
     * @return void
     */
    public function dashboard()
    {
        //with relation membership
        $monthly = \App\Subscription::where('membership_id', 1)->with('membership')->get();
        $yearly = \App\Subscription::where('membership_id', 2)->with('membership')->get();
        $member = \App\Member::latest()->first();

        $monthlyStats = array();
        $yearlyStats = array();

        foreach ($monthly as $month) 
        {
           array_push($monthlyStats, $month->membership->price);
        }
        
        foreach ($yearly as $year) 
        {
            array_push($yearlyStats, $year->membership->price);
        }

        return view('admin.home')
                ->with('yearlyStats', $yearlyStats)
                ->with('monthlyStats', $monthlyStats)
                ->with('member', $member);
    }

}

