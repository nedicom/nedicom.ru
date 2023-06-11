<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Uslugi;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function teeest(Request $request): Response 
    {
        $test =111;
    }

    public function edit(Request $request, $test): Response 
    {
            /*$test = Uslugi::orderBy('created_at','desc')
            ->where('uslugis','like','%'.$request->speciality_one_id.'%')
            ->get();*/

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'imgurl' => Auth::user()->file_path,
            'islawyer' => Auth::user()->lawyer,
            'status' => session('status'),
            'test'=>  $test,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request);
        $request->user()->fill($request->validated());
        if($request->lawyer == true){
            $request->user()->lawyer = 1;
        }
        else{
            $request->user()->lawyer = 0;
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
