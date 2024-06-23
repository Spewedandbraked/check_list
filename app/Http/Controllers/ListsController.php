<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\OptionsTable;
use App\Models\QuestionsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\Mime\Part\MessagePart;

class ListsController extends Controller
{
    public function index()
    {
        $lists = Lists::all()->where('author', Auth::id());
        return Inertia::render('Dashboard', [
            // dd($lists)
            'lists' => $lists,
            'admin' => Auth::user()->isAdmin() == true,
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
        if (Auth::user()->isAdmin()==true || $list->author == Auth::id())  {
            $options = OptionsTable::all()->where('list_id', $list->id);
            $questions = QuestionsTable::all()->where('list_id', $list->id);
            return Inertia::render('Checksingle', [
                'list' => $list,
                'options' => $options,
                'questions' => $questions,
            ]);
        }
        return 'acces denied !!!';
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
