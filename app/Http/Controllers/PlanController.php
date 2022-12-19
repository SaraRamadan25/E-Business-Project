<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index()
    {
        $features = new Collection(['online system','full access','free apps','multiple slider','free domain','support unlimited','payment online','cash back']);


            $plans = Plan::query()->get()->all();
        return view('plans.index',compact('plans','features'));
    }
    public function show(Plan $plan)
    {
        return view('plans.show',compact('plan'));
    }

    public function create(): view
    {
        return view('plans.create');
    }
    public function store(): RedirectResponse
    {

        $attributes = request()->validate([
            'name'=>'required|string',
            'price'=>'required',
            'features'=>'required',
            'is_true'=>'required|integer',

        ]);

        $plan = Plan::create([
            'name'=>$attributes['name'],
            'price'=>$attributes['price'],
            'features'=>$attributes['features'],
            'is_true'=>$attributes['is_true'],




        ]);
return redirect()->route('plans.index');
    }


}
