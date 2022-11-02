<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class notif extends Model
{
    public $timestamps = false;
    protected $fillable = ['judul','deskripsi','status','time'];
    use HasFactory;
}
