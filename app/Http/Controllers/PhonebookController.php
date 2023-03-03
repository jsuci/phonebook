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
        $subscriber = DB::table('subscribers')
                        ->where('firstname', $request->firstname)
                        ->where('middlename', $request->middlename)
                        ->where('lastname', $request->lastname)
                        ->first();
                        
        if ($subscriber) {
            // If a subscriber with the same name already exists, update its delete column to 0
            DB::table('subscribers')
                ->where('id', $subscriber->id)
                ->update(['deleted' => 0]);
            
            // Redirect back to the home page and show a success message
            return redirect('/')->with('status', 'Existing subscriber updated successfully!');
        } else {
            // If no subscriber with the same name exists, insert a new subscriber into the database
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
            return redirect('/')->with('status', 'New subscriber added successfully!');
        }
    }
    


    public function deleteSubscriber($id) {
        DB::table('subscribers')->where('id', $id)->update(['deleted' => 1]);
        return redirect('/')->with('status', 'Subscriber deleted successfully!');
    }

}
