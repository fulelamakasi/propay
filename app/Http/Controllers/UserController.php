<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the users
        $users = User::with('language')->all();

        // load the view and pass the users
        return FacadesView::make('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return FacadesView::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->mobile_number = $request->mobile_number;
        $user->id_number = $request->id_number;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->language_id = $request->language_id;

        $password = strtoupper(substr($request->surname, 0, 2)) . substr($request->birth_date, 0, 4) . substr($request->id_number, -1, 3);

        $user->password = Hash::make($password);

        $user->save();

        Session::flash('message', 'Successfully created User!');

        return FacadesView::make('users.index')
            ->with('users', User::with('language')->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get user
        $user = User::with('language')->find($id);

        return FacadesView::make('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the user
        $user = User::with('language')->find($id);

        // show the edit form and pass the user
        return FacadesView::make('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->mobile_number = $request->mobile_number;
        $user->id_number = $request->id_number;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->language_id = $request->language_id;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('message', 'Successfully updated User!');

        return FacadesView::make('users.index')
            ->with('users', User::with('language')->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $interest = User::findOrFail($id);
        $interest->delete();

        Session::flash('message', 'Successfully deleted User!');

        return FacadesView::make('users.index')
            ->with('users', User::with('language')->all());
    }
}
