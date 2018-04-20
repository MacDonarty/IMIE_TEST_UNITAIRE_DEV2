<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public const EMAIL = 'email';
    protected $fillable = [
        'email'
    ];
}