<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View as FacadesView;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the languages
        $languages = Language::all();

        // load the view and pass the languages
        return FacadesView::make('languages.index')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return FacadesView::make('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $language = new Language;
        $language->name = $request->name;

        $language->save();

        Session::flash('message', 'Successfully created Language!');

        return FacadesView::make('languages.index')
            ->with('languages', Language::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get language
        $language = Language::find($id);

        return FacadesView::make('languages.show')
            ->with('language', $language);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the language
        $language = Language::find($id);

        // show the edit form and pass the language
        return FacadesView::make('languages.edit')
            ->with('language', $language);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $language = Language::find($id);

        $language->name = $request->name;
        $language->save();

        Session::flash('message', 'Successfully updated Language!');

        return FacadesView::make('languages.index')
            ->with('languages', Language::all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        Session::flash('message', 'Successfully deleted Language!');

        return FacadesView::make('languages.index')
            ->with('languages', Language::all());
    }
}
