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
        return view('phonebook.index');
    }

    public function showProviders($id)
    {
        // Retrieve the subscriber with the given ID
        $subscriber = DB::table('subscribers')->where('id', $id)->where('deleted', 0)->first();

        // Retrieve all the providers linked to the subscriber
        $providers = DB::table('subscriber_details')->where('headerid', $id)->where('deleted', 0)->get();


        // Pass the data to the view
        $data = [
            'subscriber' => $subscriber,
            'providers' => $providers
        ];

        return view('phonebook.showProviders', [
            'data' => $data
        ]);
    }

    public function showSubscribers() {
        // Retrieve data from the two tables
        $subscribers = DB::table('subscribers')
                ->where('deleted', 0)
                ->orderBy('updateddatetime', 'desc')
                ->get();
        
        return view('phonebook.showSubscribers', [
            'subscribers' => $subscribers
        ]);
    }

    public function storeSubscriber(Request $request)
    {
        // // Validate the form data
        // $validatedData = $request->validate([
        //     'firstname' => 'required',
        //     'middlename' => 'required',
        //     'lastname' => 'required',
        //     'gender' => 'required',
        //     'address' => 'required',
        //     // Add any other validation rules you need
        // ]);
    
        // // Create a new subscriber using the validated form data
        // DB::table('subscribers')->insert([
        //     'firstname' => $validatedData['firstname'],
        //     'middlename' => $validatedData['middlename'],
        //     'lastname' => $validatedData['lastname'],
        //     'gender' => $validatedData['gender'],
        //     'address' => $validatedData['address'],
        // ]);

        DB::table('subscribers')->insert([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'address' => $request->address,
            'createddatetime' => $request->createddatetime,
            'updateddatetime' => $request->updateddatetime,
        ]);
    
        // Redirect back to the home page and show a success message
        return redirect('/')->with('status', 'Subscriber added successfully!');
    }
}
