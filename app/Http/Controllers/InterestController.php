<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View as FacadesView;

class InterestController extends Controller
{
    public function index()
    {
        // get all the interests
        $interests = Interest::all();

        // load the view and pass the interests
        return FacadesView::make('interests.index')
            ->with('interests', $interests);
    }

    public function create()
    {
        return FacadesView::make('interests.create');
    }

    public function store(Request $request)
    {
        $interest = new Interest;
        $interest->name = $request->name;

        $interest->save();

        Session::flash('message', 'Successfully created Interest!');

        return FacadesView::make('interests.index')
            ->with('interests', Interest::all());
    }

    public function show($id)
    {
        // get interest
        $interest = Interest::find($id);

        return FacadesView::make('interests.show')
            ->with('interest', $interest);
    }

    public function edit($id)
    {
        // get the interest
        $interest = Interest::find($id);

        // show the edit form and pass the interest
        return FacadesView::make('interests.edit')
            ->with('interest', $interest);
    }

    public function update(Request $request, $id)
    {
        $interest = Interest::find($id);

        $interest->name = $request->name;
        $interest->save();

        Session::flash('message', 'Successfully updated Interest!');

        return FacadesView::make('interests.index')
            ->with('interests', Interest::all());
    }

    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();

        Session::flash('message', 'Successfully deleted Interest!');

        return FacadesView::make('interests.index')
            ->with('interests', Interest::all());
    }
}
