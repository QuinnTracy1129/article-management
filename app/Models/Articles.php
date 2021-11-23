<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $softDelete = true;
    use HasFactory;
   protected $fillable = [
       'title',
       'description',
       'user_id',
   ];
   protected $appends = [
    'username', 
];

public function getUsernameAttribute()
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
    // Relationship
    public function user(){return $this->belongsTo(User::class);}  
}
