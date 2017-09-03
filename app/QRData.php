<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'status', 'value',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public static $rules = [
        'code' => 'required|unique:q_r_datas',
        'status' => 'required|in:NEW,USED',
		'value' => '',
    ];
}
