<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class SubscribeController extends Controller implements HasMiddleware
{

    /**

     * Get the middleware that should be assigned to the controller.

     */

    public static function middleware(): array

    {

        return [

            'auth',

            new Middleware('log', only: ['index']),

            new Middleware('subscribed', except: ['store']),

        ];

    }

    public function showPlans(Request $request)
    {
        $plans = Plan::all();
        return view('subscribe.plans', compact('plans'));
    }
}
