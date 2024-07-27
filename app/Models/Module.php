<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'create_by', 'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function items()
    {
        return $this->hasMany(ModuleItem::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_module');
    }
}
