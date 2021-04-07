<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Resources\TeamsResource;
use Illuminate\Support\Str;

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
