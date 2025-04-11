<?php

namespace App\Http\Controllers;

use App\Models\Language;
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
        $users = User::with('language')->get();

        // load the view and pass the users
        return FacadesView::make('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();

        return FacadesView::make('users.create')
                ->with('languages', $languages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;

        if (!$this->validateSAID($request->id_number)) {
            $languages = Language::all();
            Session::flash('message', 'Failed to Validate ID!');

            return FacadesView::make('users.create')
                    ->with('languages', $languages);
        }

        if (User::getUserByEmail($request->email)) {
            $languages = Language::all();
            Session::flash('message', 'Email already registered!');

            return FacadesView::make('users.create')
                    ->with('languages', $languages);
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->mobile_number = $request->mobile_number;
        $user->id_number = $request->id_number;
        $user->email = $request->email;
        $user->birth_date = $this->extractBirthdateFromID($request->id_number);
        $user->language_id = $request->language_id;

        $password = strtoupper(substr($request->surname, 0, 2)) . substr($request->birth_date, 0, 4) . substr($request->id_number, -1, 3);

        $user->password = Hash::make($password);

        $user->save();

        Session::flash('message', 'Successfully created User!');

        return FacadesView::make('users.index')
            ->with('users', User::with('language')->get());
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
        $languages = Language::all();

        // show the edit form and pass the user
        return FacadesView::make('users.edit')
            ->with('user', $user)
            ->with('languages', $languages);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::with('language')->find($id);
        $userByEmail = User::getUserByEmail($request->email);
        $languages = Language::all();

        if (!$this->validateSAID($request->id_number)) {
            Session::flash('message', 'Failed to Validate ID!');

            return FacadesView::make('users.edit')
                ->with('user', $user)
                ->with('languages', $languages);
        }

        if ($userByEmail && $userByEmail->id != $user->id) {
            Session::flash('message', 'Email already exists!');

            return FacadesView::make('users.edit')
                ->with('user', $user)
                ->with('languages', $languages);
        }

        if ($request->password != NULL && ($request->password !== $request->confirm_password)) {
            Session::flash('message', 'Passwords do not match!');

            return FacadesView::make('users.edit')
                ->with('user', $user)
                ->with('languages', $languages);
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->mobile_number = $request->mobile_number;
        $user->id_number = $request->id_number;
        $user->email = $request->email;
        $user->birth_date = $this->extractBirthdateFromID($request->id_number);
        $user->language_id = $request->language_id;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('message', 'Successfully updated User!');

        return FacadesView::make('users.index')
            ->with('users', User::with('language')->get());
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
            ->with('users', User::with('language')->get());
    }

    private function extractBirthdateFromID($id_number)
    {
        $birthYear = substr($id_number, 0, 2);
        $birthMonth = substr($id_number, 2, 2);
        $birthDay = substr($id_number, 4, 2);

        $birthDate = $birthYear .'-'. $birthMonth .'-'. $birthDay;

        return date('Y-m-d', strtotime($birthDate));
    }

    private function validateSAID($id_number, $gender = '', $foreigner = 0) 
    {
        $validated = false;
        
        if (is_numeric($id_number) && strlen($id_number) === 13) {       
            $errors = false;
            $num_array = str_split($id_number);
            $id_month = $num_array[2] . $num_array[3];
            $id_day = $num_array[4] . $num_array[5];

            if ( $id_month < 1 || $id_month > 12) {
                return false;
            }

            if ( $id_day < 1 || $id_day > 31) {
                return false;
            }

            $id_gender = $num_array[6] >= 5 ? 'male' : 'female';

            if ($gender && strtolower($gender) !== $id_gender) {
                return false;
            }

            $id_foreigner = $num_array[10];

            if ( ( $foreigner || $id_foreigner ) && (int)$foreigner !== (int)$id_foreigner ) {
                return false;
            }

            $even_digits = array();
            $odd_digits = array();

            foreach ( $num_array as $index => $digit) {    
                if ($index === 0 || $index % 2 === 0) {
                    $odd_digits[] = $digit;
                } else {
                    $even_digits[] = $digit;
                }
            }

            $check_digit = array_pop($odd_digits);
            $added_odds = array_sum($odd_digits);
            $concatenated_evens = implode('', $even_digits);
            $evensx2 = $concatenated_evens * 2;
            $added_evens = array_sum( str_split($evensx2) );
            $sum = $added_odds + $added_evens;
            $last_digit = substr($sum, -1);
            $verify_check_digit = (10 - $last_digit) % 10;

            if ((int)$verify_check_digit !== (int)$check_digit) {
                return false;
            }

            if (!$errors) {
                return true;
            }
        }
        
        return $validated;
    }

}
