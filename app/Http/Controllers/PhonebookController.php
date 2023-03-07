<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;

class PhonebookController extends Controller
{
    public function index()
    {
        return view('phonebook.index');
    }

    public function showProviders($id)
    {

        $results = DB::table('subscribers')
        ->join('subscriber_details', 'subscribers.id', '=', 'subscriber_details.headerid')
        ->where('subscribers.id', $id)
        ->where('subscribers.deleted', 0)
        ->where('subscriber_details.deleted', 0)
        ->select('subscribers.id',
        'subscribers.firstname',
        'subscribers.lastname', 'subscriber_details.id',
        'subscriber_details.phoneno', 'subscriber_details.provider')
        
        ->get();

        // Debugbar::info($results);

        // dd($results);

        // return $results;

        // // Retrieve the subscriber with the given ID
        // $subscriber = DB::table('subscribers')->where('id', $id)->where('deleted', 0)->first();

        // // Retrieve all the providers linked to the subscriber
        // $providers = DB::table('subscriber_details')
        //         ->where('headerid', $id)
        //         ->where('deleted', 0)
        //         ->orderBy('updated_at', 'desc')
        //         ->get();


        // // Pass the data to the view
        // $data = [
        //     'subscriber' => $subscriber,
        //     'providers' => $providers
        // ];

        return view('phonebook.showProviders', [
            'results' => $results
        ]);
    }

    public function showSubscribers() {

        $subscribers = DB::table('subscribers')
                ->where('deleted', 0)
                ->orderBy('updateddatetime', 'desc')
                ->paginate(5); // 5 records per page
                // ->get();

        Debugbar::info($subscribers);
        
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
                ->update([
                    'deleted' => 0,
                    'updateddatetime' => now(),
                    'updated_at' => now()
                ]);
            
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
                'createddatetime' => now(),
                'updateddatetime' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
            // Redirect back to the home page and show a success message
            return redirect('/')->with('status', 'New subscriber added successfully!');
        }
    }


    public function storeProvider(Request $request)
    {
        $subscriber_detail = DB::table('subscriber_details')
                        ->where('headerid', $request->headerid)
                        ->where('phoneno', $request->phoneno)
                        ->where('provider', $request->provider)
                        ->first();
                        
        if ($subscriber_detail) {
            // If a subscriber with the same name already exists, update its delete column to 0
            DB::table('subscriber_details')
                ->where('id', $subscriber_detail->id)
                ->update([
                    'deleted' => 0,
                    'updated_at' => now()
                ]);
            
            // Redirect back to the home page and show a success message
            return redirect('/')->with('status', 'Existing provider updated successfully!');
        } else {
            // If no subscriber with the same name exists, insert a new subscriber into the database
            DB::table('subscriber_details')->insert([
                'headerid' => $request->headerid,
                'phoneno' => $request->phoneno,
                'provider' => $request->provider,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
            // Redirect back to the home page and show a success message
            return redirect('/')->with('status', 'New provider added successfully!');
        }
    }



    public function searchSubscriber(Request $request)
    {
        $searchValue = $request->input('search');
    
        $subscribers = DB::table('subscribers')
                        ->where(function($query) use($searchValue) {
                            $query
                            ->where('firstname', 'LIKE', '%'.$searchValue.'%')
                            ->orWhere('lastname', 'LIKE', '%'.$searchValue.'%')
                            ->orWhere('middlename', 'LIKE', '%'.$searchValue.'%')
                            ->orWhere('gender', 'LIKE', '%'.$searchValue.'%')
                            ->orWhere('address', 'LIKE', '%'.$searchValue.'%');
                        })
                        ->where('deleted', 0)
                        ->orderBy('id', 'DESC')
                        ->paginate(5)
                        ->appends(['search' => $searchValue]);
                        // ->get();
    
        return view('phonebook.showSubscribers', ['subscribers' => $subscribers]);
    }


    public function updateSubscriber(Request $request, $id)
    {
        $subscriber = DB::table('subscribers')->where('id', $id)->first();
    
        DB::table('subscribers')
            ->where('id', $id)
            ->update([
                'lastname' => $request->input('lastname'),
                'firstname' => $request->input('firstname'),
                'middlename' => $request->input('middlename'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'updated_at' => now(),
                'updateddatetime' => now()
            ]);
    
        return redirect('/')->with('status', 'Subscriber updated successfully!');
    }

    public function updateProvider(Request $request, $id)
    {
        // $subscriber = DB::table('subscriber_details')->where('id', $id)->first();
    
        DB::table('subscriber_details')
            ->where('id', $id)
            ->update([
                'phoneno' => $request->input('phoneno'),
                'provider' => $request->input('provider'),
                'updated_at' => now()
            ]);
    
        return redirect('/')->with('status', 'Provider updated successfully!');
    }

    


    public function deleteSubscriber($id) {
        DB::table('subscribers')->where('id', $id)->update([
            'deleted' => 1,
            'deletedatetime' => now(),
            'updateddatetime' => now()
        ]);
        return redirect('/')->with('status', 'Subscriber deleted successfully!');
    }

    public function deleteProvider($id) {
        DB::table('subscriber_details')->where('id', $id)->update([
            'deleted' => 1,
            'updated_at' => now()
        ]);
        return redirect('/')->with('status', 'Provider deleted successfully!');
    }

}
