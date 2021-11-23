<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
     protected $softDelete = true;
     protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'fullname',
        'rolename', 
    ];

    public function getFullnameAttribute()
        {
            $fn=$this->fname.' '.  $this->lname;
            if($this->mname !=Null or $this->mname !='')  {
                $stringExp = explode(' ', $this->mname);
                $shortCode = '';
                for($i = 0; $i < count($stringExp); $i++):
                    $shortCode .= substr($stringExp[$i], 0, 1);
                endfor;

                $fn =$this->fname . ' ' . $shortCode  . '. ' . $this->lname ;
            }
            return  strtoupper(trim($fn));
        }
    public function getRolenameAttribute()
        { 
            if($this->role){
                return $this->role->display_name;
            }
        }
    // Relationship
    public function role(){return $this->belongsTo(Role::class);}  

}
