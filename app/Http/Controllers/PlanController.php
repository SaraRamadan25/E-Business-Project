<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PlanController extends Controller
{
    public function index()
    {
        $features = new Collection(['online system','full access','free apps','multiple slider','free domain','support unlimited','payment online','cash back']);


            $plans = Plan::all();
        return view('plans.index',compact('plans','features'));
    }
    public function show(Plan $plan)
    {
        return view('plans.show',compact('plan'));
    }

    public function create()
    {
        return view('plans.create');
    }
    public function store()
    {

        request()->validate([
            'name'=>'required|string',
            'price'=>'required',
            'features'=>'required',
            'is_true'=>'required|integer',

        ]);

        $plan = Plan::create([
            'name' =>request('name'),
            'price'=>request('price'),
            'is_true'=>request('is_true'),
            'features'=>request('features')


        ]);
return redirect()->route('plans.index');
    }


}
