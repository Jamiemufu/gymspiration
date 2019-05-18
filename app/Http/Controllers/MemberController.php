<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateMember;

class MemberController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$members = \App\Member::with('membership')->latest()->get();

		return view('admin.viewMembers')->with('members', $members);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.createMember');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ValidateMember $request) {

		//validate post
		$validated = $request->validated();
		//new member instance
		$member =  new \App\Member;
		//fill with validated
		$member->fill($validated);
		$member->save();

		return redirect()->route('dashboard')->with('status', 'Member created succesfully!');
	}

	/**
	 * search - search Member
	 *
	 * @param  mixed $request
	 * @param  mixed $id
	 *
	 * @return void
	 */
	public function search(Request $request) {

		//get value from input
		$name = $request->input('search');
		// use value and get return
		$members = \App\Member::searchNames($name)->get();

		return view('admin.viewMembers')->with('members', $members);
	}

	/**
	 * Display the searched resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//find by id
		$member = \App\Member::with('membership')->find($id);

		//format DOB
		$member->DOB = date('d.m.Y', strtotime($member->DOB));

		return view('admin.editMember')->with('member', $member);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ValidateMember $request, $id) {

		//validate post
		$validated = $request->validated();
		//new member instance
		$member =  \App\Member::find($id);
		//fill with validated
		$member->fill($validated);
		$member->update();

		return redirect()->route('viewMember')->with('status', 'Member updated succesfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		// find by id
		$member = \App\Member::find($id);

		$member->delete();

		return redirect()->route('viewMember')->with('status', "Member deleted succesfully!");
	}
}
