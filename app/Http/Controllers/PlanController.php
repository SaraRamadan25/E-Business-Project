<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('index.blade.php',compact('plans'));
    }
    public function show(Plan $plan)
    {
        return view('plan',compact('plan'));
    }
}
