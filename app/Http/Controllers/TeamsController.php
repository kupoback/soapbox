<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;
use App\Http\Resources\TeamsResource;
use Illuminate\Support\Str;

class TeamsController extends Controller
{
    
    public function index(Request $request)
    {
        return TeamsResource::collection(Teams::all());
    }
    
    public function store(Request $request)
    {
        $team = Teams::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
            ]
        );
        
        return new TeamsResource($team);
    }
    
    public function show(Teams $teams)
    {
        return new TeamsResource($teams);
    }
    
}
