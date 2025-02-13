<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        // Retorna o valor atual do contador
        $counter = Counter::firstOrCreate(['id' => 1], ['count' => 0]);
        return response()->json($counter);
    }

    public function increment()
    {
        $counter = Counter::firstOrCreate(['id' => 1]);
        $counter->increment('count');
        return response()->json($counter);
    }
   
    public function decrement()
    {
        $counter = Counter::firstOrCreate(['id' => 1]);
        $counter->decrement('count');
        return response()->json($counter);
    }
    public function decrementbig()
    {
        $counter = Counter::firstOrCreate(['id' => 1]);
        $counter->count -= 5;
        $counter->save();
        return response()->json($counter);
    }
}
