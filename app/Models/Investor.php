<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Investor extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;

    
    protected $table = "investors";

    protected $fillable = ['first_name','last_name','user_type','email','password','phone','location','iD_card','personal_photo',];

    protected $primaryKey = "id";
    public $timestamps = true ;

    public function projects(){
        return $this->hasMany( Complaint::class,'investor_id');
    }

    public function complaints(){
        return $this->hasMany( Complaint::class,'investor_id');

    }

    public function evaluations()
    {
        return $this->morphMany(Evaluation::class, 'evaluable');
    }
}
