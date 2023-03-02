<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SubscriberDetail;
use Illuminate\Support\Facades\DB;

class PhonebookController extends Controller
{
    public function index()
    {
        // Retrieve data from the two tables
        $subscribers = DB::table('subscribers')->get();
        
        
        // Process the data and pass it to the view
        // $data = [
        //     'subscribers' => $subscribers,
        //     'providers' => $providers
        // ];
        return view('phonebook.index', [
            'subscribers' => $subscribers
        ]);
    }

    public function show($id)
    {
        // Retrieve the subscriber with the given ID
        $subscriber = Subscriber::findOrFail($id);


        // Retrieve all the providers linked to the subscriber
        $providers = SubscriberDetail::where('headerid', $id)->get();

        // Pass the data to the view
        $data = [
            'subscriber' => $subscriber,
            'providers' => $providers
        ];

        return view('phonebook.show', [
            'data' => $data
        ]);
    }
}
