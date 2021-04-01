<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;
use App\Http\Resources\TeamsResource;

class TeamsController extends Controller
{
    //
    
    public function index(Request $request)
    {
        return TeamsResource::collection(1);
    }
    
    public function store(Request $request)
    {
        $team = Teams::create(
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );
        
        return new TeamsResource($team);
    }
    
    public function show(Teams $teams)
    {
        return new TeamsResource($teams);
    }
    
}
