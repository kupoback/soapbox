<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\TeamsResource;
use App\Models\Team;

class TeamsController extends Controller
{
    
    public function index(Request $request)
    {
        return TeamsResource::collection(Team::all());
    }
    
    public function store(Request $request)
    {
        $team = Team::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
            ]
        );
        
        return new TeamsResource($team);
    }
    
    public function show(Team $teams)
    {
        return new TeamsResource($teams);
    }
    
}
