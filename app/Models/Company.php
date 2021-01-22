<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'phone', 'description', 'user_id'
    ];

}
