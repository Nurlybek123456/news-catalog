<?php

namespace App\Filters;

class NewsFilter extends QueryFilter{
    public function header_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('header_id', $id);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('header', 'LIKE', '%'.$search_string.'%');
    }
}
