<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function senarai()
    {
        return $this->belongsTo(Senarai::class);
    }
}
