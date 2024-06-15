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
    public function index()
    {
        $lists = Lists::all()->where('author', Auth::id());
        return Inertia::render('Dashboard', [
            // dd($lists)
            'lists' => $lists
        ]);
    }

    public function create()
    {
        return Inertia::render('CreateCheck', [
            //params
        ]);
    }

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
        return redirect('dashboard');
    }

    public function show(string $id)
    {
        $list = Lists::where('id', $id)->first();
        $options = OptionsTable::all()->where('list_id', $list->id);
        $questions = QuestionsTable::all()->where('list_id', $list->id);
        return Inertia::render('Checksingle', [
            'list' => $list,
            'options' => $options,
            'questions' => $questions,
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        Lists::find($id)->delete();
        return redirect('dashboard');
    }
}
