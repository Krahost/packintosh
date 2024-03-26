<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profiledit(Request $request): View
    {
        return view('user.profiledit', [
            'user' => $request->user(),
        ]);
    }

    public function profile(Request $request): View
    {
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    // {

    //     // $user = new User;
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     if ($request->hasfile('image')) {
    //         $file = $request->file('image');
    //         $extenstion = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extenstion;
    //         $file->move('uploads/user/', $filename);
    //         $user->image = $filename;
    //     }

    //     $request->user()->update(['image' => ['image' => $file->getClientOriginalExtension()]]);

    //     return Redirect::route('user.profile')->with('success', 'profile-updated');
    // }
    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        // $user = new User;  // No need to create a new User instance here

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/', $filename);

            // Save the image file name to the user model
            $request->user()->image = $filename;
            $request->user()->save();  // Save the user model to persist the changes
        }

        // Remove the unnecessary update call for 'image' in this line
        // $request->user()->update(['image' => ['image' => $file->getClientOriginalExtension()]]);

        return Redirect::route('user.profile')->with('success', 'profile-updated');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
