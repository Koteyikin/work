<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
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
