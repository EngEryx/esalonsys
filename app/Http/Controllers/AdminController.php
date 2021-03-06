<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use App\SalonItem;
use App\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $new_customers = User::where(['user_type'=>1])->whereDate('created_at','>=',Carbon::today())->count();
        $new_bookings = Booking::whereDate('created_at','>=',Carbon::today())->count();
        $salon_items = SalonItem::whereDate('created_at','>=',Carbon::today())->count();
        $payments = Payment::whereDate('created_at','>=',Carbon::today())->sum('amount');
        $bookings = Booking::where('created_at','>=',Carbon::today())->get();
        return view('admin.dashboard', compact('new_customers','bookings','new_bookings','payments','salon_items'));
    }

    public function customers()
    {
        $users = User::where(['user_type' => 1])->get();
        return view('admin.customers')
            ->with('customers', $users);
    }

    public function products()
    {
        $salonitems = SalonItem::all();
        return view('admin.products')
            ->with('products',$salonitems);
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:salon_items|max:191',
            'short_description' => 'required|max:191',
            'long_description' => 'required',
            'price' => 'required|numeric',
            'item_type' => 'required',
            'img_url' => 'required|file|image',
        ]);
        $file_name = time().'.'.$request->file('img_url')->getClientOriginalExtension();
        $request->file('img_url')->move(public_path('uploads'),$file_name);
        $url = url('/uploads').'/'.$file_name;
        $data = $request->except('img_url');
        $data['img_url'] = $url;
        $product = SalonItem::create($data);
        if(!$product){
            return redirect()->back();
        }
        return redirect()->route('admin.products')->with('status','Successfully Saved!');
    }

    public function payments()
    {
        return view('admin.payments')
            ->with('payments',Payment::all());
    }

    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings')->with('bookings',$bookings);
    }

    public function deleteProduct(SalonItem $salonitem)
    {
        try {
            $salonitem->delete();
        } catch (\Exception $e) {
        }
        return response()->json(['success' => true]);
    }

    public function editProduct(SalonItem $salonitem)
    {
        return view('admin.products-edit', compact('salonitem'));
    }

    public function saveEditProduct(SalonItem $salonitem, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:salon_items,id,'.$salonitem->id.'|max:191',
            'short_description' => 'required|max:191',
            'long_description' => 'required',
            'price' => 'required|numeric',
            'item_type' => 'required',
            'img_url' => 'file|image',
        ]);

        $data = $request->all();

        if($request->hasFile('img_url')){
            $file_name = time().'.'.$request->file('img_url')->getClientOriginalExtension();
            $request->file('img_url')->move(public_path('uploads'),$file_name);
            $url = url('/uploads').'/'.$file_name;
            $data = $request->except('img_url');
            $data['img_url'] = $url;
        }

        $salonitem->update($data);

        return redirect()->route("admin.products")->withStatus('Product updated successfully!');
    }

    public function downloadBookings()
    {
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('print.booking-report')->with([
            'bookings' => Booking::all()
        ]));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        return $dompdf->stream(Carbon::today()->format('d M Y'));
    }
}
