<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lists extends Model
{
    use HasFactory;

    protected $fillable = array('title', 'description', 'author');

    public function Options(): HasMany
    {
        return $this->hasMany(OptionsTable::class);    
    }
    public function Questions(): HasMany
    {
        return $this->hasMany(QuestionsTable::class);    
    }
}
