<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_url = ShortLink::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
        return view('shortner',['all_url'=>$all_url]);
    }

    public function shortURL(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required',
            'title' => 'required',
        ]);
        $url = $request->url;
        $title = $request->title;
        $new_url = new ShortLink;
        $new_url->url = $url;
        $new_url->name = $title;
        $new_url->code = Str::random(8);
        $new_url->user_id = Auth::user()->id;
        $new_url->save();

        $all_url = ShortLink::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
        return view('url-table',['all_url'=>$all_url]);

    }
}
