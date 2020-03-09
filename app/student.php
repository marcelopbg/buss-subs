<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class student extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'birthdate',
        'group_id'
    ];

    public function getFormattedDateAttribute()
    {
        return (new Carbon($this->attributes['birthdate']))->format('d/m/Y');
    }

    public function getFormattedSexAttribute()
    {
        switch ($this->attributes['sex']) {
            case 1:
                return 'Masculino';
                break;

            case 2:
                return 'Feminino';
                break;
        }
    }
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
