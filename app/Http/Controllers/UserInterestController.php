<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\User;
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
        $user_interests = UserInterest::with('user', 'interest')->get();

        // load the view and pass the user_interests
        return FacadesView::make('user_interest.index')
            ->with('user_interests', $user_interests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $interests = Interest::all();
        $users = User::all();

        return FacadesView::make('user_interest.create')
                ->with('interests', $interests)
                ->with('users', $users);
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
            ->with('user_interests', UserInterest::with('user', 'interest')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get user_interest
        $user_interest = UserInterest::with('user', 'interest')->find($id);

        return FacadesView::make('user_interest.show')
            ->with('user_interest', $user_interest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the user_interest
        $user_interest = UserInterest::with('user', 'interest')->find($id);
        $interests = Interest::all();
        $users = User::all();

        return FacadesView::make('user_interest.edit')
            ->with('user_interest', $user_interest)
            ->with('interests', $interests)
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_interest = UserInterest::find($id);

        if (UserInterest::getUserInterest($request->user_id, $request->interest_id)) {
            Session::flash('message', 'User Interest already exists!');
            $user_interest = UserInterest::with('user', 'interest')->find($id);
            $interests = Interest::all();
            $users = User::all();
    
            return FacadesView::make('user_interest.edit')
                ->with('user_interest', $user_interest)
                ->with('interests', $interests)
                ->with('users', $users);
        }

        $user_interest->user_id = $request->user_id;
        $user_interest->interest_id = $request->interest_id;

        $user_interest->save();

        Session::flash('message', 'Successfully updated User Interest!');

        return FacadesView::make('user_interest.index')
            ->with('user_interests', UserInterest::with('user', 'interest')->get());
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
            ->with('user_interests', UserInterest::with('user', 'interest')->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function showAllUserInterestsByUser($user_id)
    {
        // get all the user_interests
        $user_interests = UserInterest::getUserInterestByUser($user_id);

        // load the view and pass the user_interests
        return FacadesView::make('user_interest.show_all_by_user')
            ->with('user_interests', $user_interests);
    }
}
