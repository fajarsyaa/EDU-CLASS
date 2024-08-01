<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleItem extends Model
{
    use HasFactory;

    protected $table = 'module_items';
    protected $guarded = [];
}
