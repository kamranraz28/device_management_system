<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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


    public function display(Request $request, $sn)
    {
        // Access the JSON data
        $data = $request->json()->all();
        dd($sn);
    }


}

