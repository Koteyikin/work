<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


// Добавьте HasFactory сюда

#[UseFactory(TaskFactory::class)]
class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
      'title',
      'description',
      'status',
      'priority',
      'deadline',
      'project_id',
      'user_id',
    ];

    protected $casts = [
        'deadline' => 'date:Y.m.d',
        'status' => 'string',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
