<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Resources\TeamResource;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return TeamResource::collection($team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     *
     * @return \Illuminate\Http\Response|\Illuminate\Support\Collection|array
     */
    public function show($slug)
    {
        $team = Team::where('slug', $slug)->first();
        $topics = [];
        if ($team) {
            $topics = $team->topics;
        }
        return [
            'team' => $team,
            'topics' => $topics,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
