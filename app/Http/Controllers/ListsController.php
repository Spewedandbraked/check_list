<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\OptionsTable;
use App\Models\QuestionsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            //params
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreateCheck', [
            //params
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $list = Lists::create([
            'title'=>$request->input('listTitle'),
            'description'=>$request->input('listDesc'),
            'author'=> Auth::id(),
        ]);
        $id = $list->id; //🙄боже так тупо

        foreach ($request->input('questions') as $data){
            $question = QuestionsTable::create([
                'content'=>$data,
                'list_id'=>$id,
            ]);
        }

        foreach ($request->input('options') as $data){
            $option = OptionsTable::create([
                'content'=>$data,
                'list_id'=>$id,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
