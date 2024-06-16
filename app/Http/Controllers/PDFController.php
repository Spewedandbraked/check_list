<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\OptionsTable;
use App\Models\QuestionsTable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PDFController extends Controller
{
    public function index($id){
        $list = Lists::where('id', $id)->first();
        $options = OptionsTable::all()->where('list_id', $list->id);
        $questions = QuestionsTable::all()->where('list_id', $list->id);

        $pdf = PDF::loadView('pdf', ['questions' => $questions, 'options' => $options, 'list' => $list,]);
        return $pdf->download('users-lists.pdf');
    }
    // public function index2($id){
    //     $list = Lists::where('id', $id)->first();
    //     $options = OptionsTable::all()->where('list_id', $list->id);
    //     $questions = QuestionsTable::all()->where('list_id', $list->id);
        
    //     return view('pdf',['questions' => $questions, 'options' => $options, 'list' => $list,]);
    // }
}
