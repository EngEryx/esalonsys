<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\SalonItem;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("index")->with('products',SalonItem::all());
    }

    public function services()
    {
        return view('services')->with('products',SalonItem::where(['item_type'=>2])->get());
    }

    public function products()
    {
        return view('products')->with('products',SalonItem::where(['item_type'=>1])->get());
    }

    public function feedback(Request $request)
    {
        $this->validate($request,[
            'feed_type' => 'required'
        ]);

        $data = $request->only('feed_type','message');
        $data['status'] = 1;
        $feedback = Feedback::create($data);
        session()->flash('status',"Thank you! We've received your feedback.");
        return redirect()->route('landing');
    }
}
