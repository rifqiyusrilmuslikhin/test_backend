<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $table = 'skills';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $dates = ['deleted_at'];
    const CREATED_BY = 'alt_created_by';
    const UPDATED_BY = 'alt_updated_by';
    const DELETED_BY = 'alt_deleted_by';

    public function candidates() {
        return $this->belongsToMany('App\Candidates');
    }
}
