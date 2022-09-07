<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Candidates extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $table = 'candidates';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $dates = ['deleted_at'];
    const CREATED_BY = null;
    const UPDATED_BY = null;
    const DELETED_BY = null;

    // protected static function boot() {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->created_by = is_object(Auth::guard(cofig('app.guards.web'))->user()) ? Auth::guard
    //     })
    // }

    public function skills() {
        return $this->belongsToMany('App\Skills');
    }
}
