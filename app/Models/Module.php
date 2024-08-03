<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'create_by', 'status', 'class_id','desc'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function items()
    {
        return $this->hasMany(ModuleItem::class);
    }

}
