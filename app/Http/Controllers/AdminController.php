<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * __construct only role admin
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('role:admin');
	}

	/**
	 * index - return stats for dash
	 *
	 * @return void
	 */
	public function dashboard() {
		//with relation membership
		$monthly = \App\Member::with('membership')->where('membership_id', 1)->get();
		$yearly = \App\Member::with('membership')->where('membership_id', 2)->get();
		$member = \App\Member::latest()->first();
		//empty array set
		$monthlyStats = array();
		$yearlyStats = array();
		//push all months
		foreach ($monthly as $month) {
			array_push($monthlyStats, $month->membership->price);
		}
		//push all years
		foreach ($yearly as $year) {
			array_push($yearlyStats, $year->membership->price);
		}
		//return dashboard with stats
		return view('admin.home')
			->with('yearlyStats', $yearlyStats)
			->with('monthlyStats', $monthlyStats)
			->with('member', $member);
	}

	/**
	 * reports
	 *
	 * @return void
	 */
	public function reports() {
		//return reports dash
		return view('admin.reports');

	}

	/**
	 * LaraCSV to export CSV
	 *
	 * @return void
	 */
	public function exportAllMembers() {
		//get all members
		$members = \App\Member::with('membership')->get(); // All Members
		//new csv
		$csvExporter = new \Laracsv\Export();
		//build and download
		return $csvExporter
			->build($members,
				[
					'firstName',
					'lastName',
					'email',
					'address_line_1',
					'address_line_2',
					'town',
					'county',
					'postcode',
					'phone',
					'DOB',
					'membership_id',
					'membership.type',
					'created_at',
				])
			->download('all_members.csv');

	}

	/**
	 * exportMembershipMonth 1 = monthly
	 *
	 * @return void
	 */
	public function exportMonthType() {
		//we know membership_id 1 is monhtly
		$month = \App\Member::with('membership')->where('membership_id', 1)->get();
		//new csv
		$csvExporter = new \Laracsv\Export();
		//build and download
		return $csvExporter
			->build($month, ['firstName', 'lastName', 'membership.type' => 'membership type', 'membership.price' => 'price'])->download('monthly_members.csv');

	}

	/**
	 * exportYearlyType 2 = yearly
	 *
	 * @return void
	 */
	public function exportYearlyType() {
		//we know membership_id 2 is yearly
		$year = \App\Member::with('membership')->where('membership_id', 2)->get();
		//new export
		$csvExporter = new \Laracsv\Export();

		return $csvExporter
			->build($year, ['firstName', 'lastName', 'membership.type' => 'membership type', 'membership.price' => 'price'])->download('yearly_members.csv');

	}

	/**
	 * export monthly members csv
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function exportMonthlyMembers(Request $request) {
		//receive month from post
		$month = $request->month;
		//use month
		$members = \App\Member::with('membership')->whereMonth('created_at', $month)->get();
		//new export
		$csvExporter = new \Laracsv\Export();
		//build and download
		return $csvExporter
			->build($members,
				[
					'firstName',
					'lastName',
					'email',
					'address_line_1',
					'address_line_2',
					'town',
					'county',
					'postcode',
					'phone',
					'DOB',
					'membership_id',
					'membership.type' => 'membership type',
					'created_at',
				])->download('members_by_month.csv');

	}

}
