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
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/display/$sn";

        // Perform the POST request with the 'message' field
        $response = Http::post($url, [
            'message' => $request->input('message')
        ]);

        $message = "Message sent successfully to the device $sn.";
        
        return view('frontdesk.sendData', compact('sn','message'));
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
        $baseUrl = 'http://167.172.83.81:3000';

        // Construct the URL with the 'sn' as part of the path
        $url = "$baseUrl/qr/$sn";

        // Perform the POST request with the 'message' field
        $response = Http::post($url, [
            'message' => $request->input('message')
        ]);

        $message = "QR sent successfully to the device $sn.";
        
        return view('frontdesk.qrcode_view', compact('sn','message'));
    }

    



}

