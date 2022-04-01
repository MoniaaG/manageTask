<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['status'];
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function creator() {
        return $this->hasOne(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function previous($limit = 0)
    {
        return $this->siblings(false, $limit);
    }

    public function next($limit = 0)
    {
        return $this->siblings(true, $limit);
    }

    public function siblings($isNext, $limit = 0)
    {
        $sortableFieldName = 'order';
        $query = static::applyStageGroup($this->newQuery(), $this);
        $query->where('creator_id', Auth::id())
        ->where($sortableFieldName, $isNext ? '>' : '<', $this->getAttribute($sortableFieldName))
            ->orderBy($sortableFieldName, $isNext ? 'asc' : 'desc');

        if ($limit !== 0) {
            $query->limit($limit);
        }

        return $query;
    }

    protected static function applyStageGroup($query, $model)
    {
        $sortableStageFieldName = static::getSortableStageFieldName();
        return  $sortableStageFieldName !== null ?  $query->where($sortableStageFieldName, $model->$sortableStageFieldName) : $query;
    }
}
