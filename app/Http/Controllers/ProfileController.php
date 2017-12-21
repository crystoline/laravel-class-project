<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::get();

        return view('profile.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required|max:100',
		    'last_name' => 'required|max:100',
		    'gender'    => ['required', Rule::in(['male', 'female']),],
		    'dob'       => 'required|date',
		    'height'    => 'required|numeric'
	    ]);


        Profile::create($request->all());

        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
    	return view('profile.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
	    $this->validate($request, [
		    'first_name' => 'required|max:100',
		    'last_name' => 'required|max:100',
		    'gender'    => ['required', Rule::in(['male', 'female']),],
		    'dob'       => 'required|date',
		    'height'    => 'required|numeric'
	    ]);

	    $profile->update($request->all());

	    return redirect()->route('profile.show', ['profile' => $profile->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Profile $profile)
    {
        $profile->delete();
	    return redirect()->route('profile.index');
    }
}
