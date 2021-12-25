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

    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function section(){
       return $this->belongsTo(Section::class,'section_id');
    }

    public function scopeSearch($query,$term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('name','like',$term)
            ->orWhere('email','like',$term)
            ->orWhere('parentName','like',$term)
            ->orWhere('yearJoined','like',$term)
            ->orWhere('created_at','like',$term)
            ->orWhere('phoneNumber','like',$term)
            
           -> orWhereHas('class',function($query)use($term){
                $query->where('name','like',$term);
            })
             -> orWhereHas('section',function($query)use($term){
                $query->where('name','like',$term);
            });

        });
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'parentName',
        'phoneNumber',
        'yob',
        'yearJoined',
        'section_id',
        'class_id',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
