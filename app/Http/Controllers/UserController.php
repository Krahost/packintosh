<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $books = Book::where("user_id", Auth::user()->id)->count();
        return view('user.index', compact('books'));
    }
    public function book()
    {
        return view('user.book');
    }
    public function payment()
    {
        $book = Session::get('payment.index');
        return view('payment.index');
    }
    public function profile()
    {
        return view('user.profile');
    }

    public function profiledit(User $user)
    {

        return view('user.profiledit');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = new User;
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/user/', $filename);
            $user->image = $filename;
        }

        $request->user()->save();

        return Redirect::route('user.profiledit')->with('status', 'profile-updated');
    }
    // public function getImageURL()
    // {
    //     if ($this->image) {
    //         return Url('storage/' . $this->image);
    //     }
    //     return 'https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}';
    // }
    public function settings(Request $request)
    {

        $user = $request->user();
        $is_Admin = $request->user()->is_Admin();
        return view('user.settings', compact('is_Admin'));
    }
}
