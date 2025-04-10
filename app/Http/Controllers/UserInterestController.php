<?php

namespace App\Http\Controllers;

use App\Models\UserInterest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Http\Request;

class UserInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the user_interests
        $user_interests = UserInterest::with('users', 'interests')->all();

        // load the view and pass the user_interests
        return FacadesView::make('user_interest.index')
            ->with('user_interests', $user_interests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return FacadesView::make('user_interest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_interest = new UserInterest;

        $user_interest->user_id = $request->user_id;
        $user_interest->interest_id = $request->interest_id;

        $user_interest->save();

        Session::flash('message', 'Successfully created User Interest!');

        return FacadesView::make('user_interest.index')
            ->with('user_interests', UserInterest::with('users', 'interests')->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get user_interest
        $user_interest = UserInterest::with('users', 'interests')->find($id);

        return FacadesView::make('user_interest.show')
            ->with('user_interest', $user_interest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the user_interest
        $user_interest = UserInterest::with('users', 'interests')->find($id);

        // show the edit form and pass the user_interest
        return FacadesView::make('user_interest.edit')
            ->with('user_interest', $user_interest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_interest = UserInterest::find($id);

        $user_interest->user_id = $request->user_id;
        $user_interest->interest_id = $request->interest_id;

        $user_interest->save();

        Session::flash('message', 'Successfully updated User Interest!');

        return FacadesView::make('user_interest.index')
            ->with('user_interests', UserInterest::with('users', 'interests')->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_interest = UserInterest::findOrFail($id);
        $user_interest->delete();

        Session::flash('message', 'Successfully deleted User Interest!');

        return FacadesView::make('user_interest.index')
            ->with('user_interests', UserInterest::with('users', 'interests')->all());
    }
}
