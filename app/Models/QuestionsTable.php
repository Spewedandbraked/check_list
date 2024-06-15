<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsTable extends Model
{
    use HasFactory;

    protected $fillable = array('content','list_id');
    public $timestamps = false;
}
