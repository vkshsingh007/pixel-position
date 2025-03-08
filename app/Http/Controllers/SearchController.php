<?php

namespace App\Http\Controllers;

use App\Models\Job;


class SearchController extends Controller
{
    public function __invoke()
    {
        $jobs = Job::with('employer', 'tag')->where('title', 'LIKE', '%' . request('q') . '%')->get();
        return view('result', ['jobs' => $jobs]);
    }
}
