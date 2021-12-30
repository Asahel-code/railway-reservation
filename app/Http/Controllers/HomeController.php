<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Destination;
use Livewire\WithPagination;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = Ticket::with('train')->get();
        $destinations = Destination::limit(6)->get();

        return view('layouts.home', ['tickets' => $tickets, 'destinations'=>$destinations]);   
    }

    use WithPagination;
    public function tickets(Request $request){
        if(isset($_GET['from'])){
            $from = $_GET['from'];
            $to =$_GET['to'];
            $depature_date=$_GET['date'];
            $direction = $_GET['train_direction'];


            $tickets = Ticket::with('train')->where('ticket_type', 'LIKE', '%'.$direction.'%')
            ->whereHas('train', function($query) use($from, $to, $depature_date){
                $query->where('source_id', 'LIKE', '%'.$from.'%')
                ->orWhere('destination_id' , 'LIKE' , '%'.$to.'%')
                ->orWhere('date', 'LIKE', '%'.$depature_date.'%');
            })->get();

            $total_tickets = Ticket::get();
            
            


            if($tickets == "")
            {
                return redirect('/')->with('fail','Currently there are no tickets available to book a train');;
            }
            else{
                return view('layouts.available-tickets',['tickets'=>$tickets, 'total_tickets'=>$total_tickets]);
            }

            
        }
        else{
            return redirect('/');
        }
       
       
        // $from = trim($request->get('from'));
        // $to =trim($request->get('to'));
        // $direction = trim($request->get('train_direction'));

        // $tickets = Ticket::query()
        // ->where('ticket_type', 'like', "{%$direction%}")
        // ->orWhere('source_id', 'like' ,"{%$from%}")
        // ->orWhere('destination_id', 'like', "{%$to%}")
        // ->with('source')->with('destination')
        // ->get();

        
    }
    public function paginationView(){
        return view('layouts.custom-pagination');
    }

    
    public function notification(){
        $destinations = Destination::limit(6)->get();
        return view('layouts.notification',[ 'destinations'=>$destinations]);
    }

    
}
