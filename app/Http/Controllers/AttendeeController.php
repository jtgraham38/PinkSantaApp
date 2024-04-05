<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Attendee;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate user input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|integer'
        ]);

        //create the attendee
        $attendee = Attendee::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);


        //redirect to homepage
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate user input
        $updated_info = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000'
        ]);

        //  find the attendee with the correlating id
        $attendee = Attendee::findOrFail($id);

        //  update the attendee with the new validated data
        $attendee->update($updated_info);

        //redirect to homepage
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  find the attendee with the correlating id
        $attendee = Attendee::findOrFail($id);

        //  delete that attendee
        $attendee->delete();

        //redirect to homepage
        return redirect('/');
    }
}