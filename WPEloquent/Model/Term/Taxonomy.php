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
}
