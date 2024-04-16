<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function printSubscriptions()
    {
        $model = new \App\Models\Subscription;

        return view('reports.print', compact('model'));
    }

    public function printTrainees()
    {
        $model = new \App\Models\Trainee();

        return view('reports.print', compact('model'));
    }

    public function printCoaches()
    {
        $model = new \App\Models\Coach();

        return view('reports.print', compact('model'));
    }
}
