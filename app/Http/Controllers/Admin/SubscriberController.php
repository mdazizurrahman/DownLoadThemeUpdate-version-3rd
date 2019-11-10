<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role->id == 1) {
            $subscribers = Subscriber::latest()->get();
            return view('admin.subscriber.index', compact('subscribers'));
        }else{return redirect()->route('login');}
    }


    public function destroy($subscriber)
    {
        if(Auth::check() && Auth::user()->role->id == 1)
        {
            $subscriber = Subscriber::findOrFail($subscriber)->delete();
            Toastr::success('Subscriber Successfully Deleted','Success');
            return redirec()->back();
        }else{

            Toastr::error('Please login first! then next Process','Error');
            return redirect()->route('login');
        }
    }

}
