<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Http\Resources\V1\SkillResource;

class SkillController extends Controller
{
    public function index()
    {
        return SkillResource::collection(Skill::all());
        // return SkillResource::collection(Skill::paginate(1));
        // return new SkillCollection(Skill::paginate(1));
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function store(StoreSkillRequest $request)
    {
        Skill::create($request->validated());
        return response()->json('Skill created!');
    }

    public function update(StoreSkillRequest $request, Skill $skill)
    {   
        // return [$skill];
        $skill->update($request->validated());
        return response()->json('Skill updated!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json('Skill deleted!');
    }
}
