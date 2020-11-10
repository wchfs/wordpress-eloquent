<?php

namespace WPEloquent\Model\Term;

class Taxonomy extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'term_taxonomy';

    public function term() {
        return $this->belongsTo(\WPEloquent\Model\Term::class, 'term_id', 'term_id');
    }

    public function parentTaxonomy() {
        return $this->belongsTo(\WPEloquent\Model\Term\Taxonomy::class, 'parent', 'term_id');
    }

    public function childrenTaxonomy()
    {
        return $this->hasMany(\WPEloquent\Model\Term\Taxonomy::class, 'parent', 'term_id');
    }

    public function posts()
    {
        return $this->hasManyThrough(
            \WPEloquent\Model\Post::class,
            \WPEloquent\Model\Term\Relationships::class,
            'term_taxonomy_id',
            'ID',
            'term_id',
            'object_id'
        );
    }

    public function scopeWithoutParents()
    {
        return $this->where('parent', 0);
    }
}
