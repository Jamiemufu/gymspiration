<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	public function store(Request $request) {
		//validate post
		$validatedData = $request->validate([
			'firstname' => 'required|min:3|max:100',
			'lastname' => 'required|min:3|max:100',
			'email' => 'required|email',
			'address_line_1' => 'required|min:2',
			'address_line_1' => 'min:2',
			'town' => 'required|min:2',
			'county' => 'required|min:2',
			'postcode' => 'required|min:4',
			'membership' => 'integer',
		]);

		//store member
		$member = new \App\Member;

		$member->firstName = $request->firstname;
		$member->lastName = $request->lastname;
		$member->email = $request->email;
		$member->address_line_1 = $request->address_line_1;
		$member->address_line_2 = $request->address_line_2;
		$member->town = $request->town;
		$member->county = $request->county;
		$member->postcode = $request->postcode;
		$member->phone = $request->phone;
		$member->DOB = $request->dob;
		$member->membership_id = $request->membership;

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

		$name = $request->input('search');

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
	public function update(Request $request, $id) {
		//validate post
		$validatedData = $request->validate([
			'firstname' => 'required|min:3|max:100',
			'lastname' => 'required|min:3|max:100',
			'email' => 'required|email',
			'address_line_1' => 'required|min:2',
			'address_line_1' => 'min:2',
			'town' => 'required|min:2',
			'county' => 'required|min:2',
			'postcode' => 'required|min:4',
			'membership' => 'integer',
		]);

		//store member
		$member = \App\Member::find($id);

		$member->firstName = $request->firstname;
		$member->lastName = $request->lastname;
		$member->email = $request->email;
		$member->address_line_1 = $request->address_line_1;
		$member->address_line_2 = $request->address_line_2;
		$member->town = $request->town;
		$member->county = $request->county;
		$member->postcode = $request->postcode;
		$member->phone = $request->phone_number;
		$member->DOB = $request->dob;
		$member->membership_id = $request->membership;

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
		$member = \App\Member::find($id);

		$member->delete();

		return redirect()->route('viewMember')->with('status', "Member deleted succesfully!");
	}
}
