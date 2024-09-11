<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class ClientController extends Controller
{
    public function real_list(Request $request)
    {
        $baseUrl = 'http://167.172.83.81:3000';

        // Make a GET request to the /clients endpoint
        $response = Http::get("$baseUrl/clients");

        if ($response->successful()) {
            $clients = $response->json();

            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json(['clients' => $clients]);
            }

            // Render the view for non-AJAX requests
            return view('frontdesk.realList', compact('clients'));
        } else {
            return redirect()->back()->withErrors('Unable to fetch clients data.');
        }
    }


    public function send($sn)
    {
        // dd($sn);
        // Access the JSON data
        $message = null;
        return view('frontdesk.sendData', compact('sn','message'));
    
    }

    public function display(Request $request, $sn)
    {
        // dd($request->all());
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/display/$sn";

        // Perform the POST request with the 'message' field
        $response = Http::post($url, [
            'message' => $request->input('message')
        ]);

        $message = "Message sent successfully to the device $sn.";
        
        return redirect()->back()->with(compact('message'));
    }

    public function qrcode_view($sn)
    {
        // dd($sn);
        // Access the JSON data
        $message = null;
        return view('frontdesk.qrcode_view', compact('sn','message'));
    
    }

    public function qr(Request $request, $sn)
    {
        //dd($request->all());
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/qr/$sn";

        // Perform the POST request with the 'message' field
        $response = Http::post($url, [
            'message' => $request->input('message')
        ]);

        $message = "QR sent successfully to the device $sn.";
        
        return redirect()->back()->with(compact('message'));
    }


    public function cashin(Request $request, $sn)
    {
        //dd($request->all());
        // dd($sn);
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/cash-in/$sn";

        $response = Http::post($url, [
            'amount' => $request->input('amount'),
            'phone' => $request->input('phone')
        ]);

        $message = "Cash-in successfull for the device $sn.";

        return redirect()->back()->with(compact('message'));

    }


    public function cashout(Request $request, $sn)
    {
        //dd($request->all());
        // dd($sn);
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/cash-out/$sn";

        $response = Http::post($url, [
            'amount' => $request->input('amount'),
            'phone' => $request->input('phone')
        ]);

        $message = "Cash-out successfull for the device $sn.";

        return redirect()->back()->with(compact('message'));

    }


    public function paybill(Request $request, $sn)
    {
        //dd($request->all());
        // dd($sn);
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/bill-pay/$sn";

        $response = Http::post($url, [
            'amount' => $request->input('amount'),
            'phone' => $request->input('phone')
        ]);

        $message = "Bill Pay successfull for the device $sn.";

        return redirect()->back()->with(compact('message'));

    }


    public function register_now(Request $request)
    {
        // dd($request->all());
        $phone = $request['phone'];
        $message = "Device has been registered for the Marchant- $phone successfully.";

        return redirect()->back()->with(compact('message'));
    }


    



}

