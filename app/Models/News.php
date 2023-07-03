<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['header','announcement','content','heading_id','author_id','is_published','published_at'];
    public function scopeFilter(Builder $builder, QueryFilter $filter){

        return $filter->apply($builder);
    }
}
