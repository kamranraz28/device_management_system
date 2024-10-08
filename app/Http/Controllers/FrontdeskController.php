<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\VisitDetail;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;


class FrontdeskController extends Controller
{
    //
    public function new_visitor()
    {
        $visitors = Visitor::all()->where('status', 0);
        // dd($visitors);
        $newCount = $visitors->count();
        // dd($newCount);

        

        return view('frontdesk.newVisitorList',compact('visitors','newCount'));
    }

    public function total_visitor()
    {
        $visitors = Visitor::all();
        // dd($visitors);
        $vcount = $visitors->count();
        // dd($newCount);

        

        return view('frontdesk.totalVisitorList',compact('visitors','vcount'));
    }

    public function dashboard()
    {
        $vcount = Visitor::count();
        // dd($vcount);
        $newCount = Visitor::where('status', 0)->count();

        $qualityCount = VisitDetail::where('department_id',3)->count();
        $designCount = VisitDetail::where('department_id',1)->count();

        return view('frontdesk.dashboard',compact('vcount','newCount','qualityCount','designCount'));
    }

    public function application_details($id)
    {
        
    
        return view('frontdesk.applicationDetails');

    }
    public function new_visitor_add()
    {
        $department= Department::all();
        $staffs = Staff::all();
        return view('frontdesk.addNewVisitor',compact('department','staffs'));
    }

    public function final_approve(Request $request)
    {

        $request->validate([
            'visitor_id' => 'required|numeric',
            'card_number' => 'required|string',
        ]);
    
        $visitorId = $request->input('visitor_id');
        $cardNumber = $request->input('card_number');

        $visitor = Visitor::find($visitorId);
        // dd($visitor);
    
        // Update the visitor's status
        $visitor->update([
            'status' => 1,
            'card_number'=> $cardNumber,
        ]);

        return redirect()->back()->with('success', 'Visitor status updated successfully');
    }

    public function warranty_activation()
    {
        return view('frontdesk.warranty_activation');
    }

    public function device_activation_report()
    {
        return view('frontdesk.device_activation_report');
    }

    public function stock_report()
    {
        return view('frontdesk.stock_report');
    }

    public function registered_device_report()
    {
        return view('frontdesk.registered_device_report');
    }

    public function unregistered_device_report()
    {
        return view('frontdesk.unregistered_device_report');
    }

    public function device_repair_report()
    {
        return view('frontdesk.device_repair_report');
    }

    public function user()
    {
        $visitors = User::all();
        // dd($visitors);
        $newCount = $visitors->count();
        // dd($newCount);

        

        return view('frontdesk.userList',compact('visitors','newCount'));
    }

    public function new_user_add()
    {
        return view('frontdesk.addNewUser');
    }

    public function storeUser(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->level = $request->level;

        $user->save();
        return redirect()->back()->with('success_message', 'User Has Been Successfully Created.');
    }

    public function total_device()
    {
        return view('frontdesk.total_device');
    }

    public function transection_log()
    {
        return view('frontdesk.transection_log');
    }
    
}
