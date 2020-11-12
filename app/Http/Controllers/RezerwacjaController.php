<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rezerwacja;
use DateTime;

class RezerwacjaController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function index() 
    {
        $today = date("d/m/Y");
        $datetime = new DateTime('tomorrow');
        $tommorow = $datetime->format('d/m/Y');

        
        $sum_tom = Rezerwacja::where('datepicker', $tommorow)->where('status','0')->count();
        $sum_accept = Rezerwacja::where('status', '1')->count();
        $all_tom = Rezerwacja::where('datepicker', $tommorow)->where('status','0')->get();

        $sum_tod = Rezerwacja::where('datepicker', $today)->where('status','0')->count();
        $sum_wait = Rezerwacja::where('status', '0')->count();
        $all_tod = Rezerwacja::where('datepicker', $today)->where('status','0')->get();

        $hours = array();
        for($i = 8; $i<19;$i++){
            $i = (string)$i;
            $stats = Rezerwacja::where('time', $i.':00')->count();
            array_push($hours, $stats);
        }

        $data = array($sum_accept, $sum_wait);
        return view('rezerwacje/index')->with(compact('all_tom', 'all_tod', 'sum_tod', 'sum_tom', 'data', 'hours'));
    }

    public function create() 
    {
        $all = Rezerwacja::where('status', '0')->orderBy('datepicker', 'DESC')->get();
        return view('rezerwacje/create', compact('all'));
    }

    public function accept(Rezerwacja $item)
    {
        $item->update(['status'=>'1']);

        return redirect()->route('rezerwacje/create');
    }

    public function store(Request $request) 
    {
        Rezerwacja::create($request->all());
        return redirect()->route('rezerwacje/create');
    }

    public function destroy(Rezerwacja $item) 
    {
        $item->delete();
        return redirect()->route('rezerwacje/create');
    }
}
