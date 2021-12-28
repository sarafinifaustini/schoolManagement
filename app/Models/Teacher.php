<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
 use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'section_id',
        'class_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function section(){
       return $this->belongsTo(Section::class);
    }
    public function subject(){
       return $this->belongsTo(Subject::class);
    }
    Public function users(){
        return $this->hasMany(Users::class);
    }

      public function scopeSearch($query,$term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('name','like',$term)
            ->orWhere('email','like',$term)
            ->orWhere('subject_id','like',$term)
            ->orWhere('created_at','like',$term)

           -> orWhereHas('class',function($query)use($term){
                $query->where('name','like',$term);
            })
             -> orWhereHas('section',function($query)use($term){
                $query->where('name','like',$term);
            });

        });
    }
     public function scopeStudentsQuery($query){
        $search_term = request('q','');

         $selectedClass = request('selectedClass');
         $selectedSection = request('selectedClass');
         $sort_direction = request('sort_direction','desc');

            if(!in_array($sort_direction,['asc','desc'])){
                $sort_direction="desc";
            }
            $sort_field= request('sort_field','created_at');
            if(!in_array($sort_field,['name','email','created_at'])){
                $sort_field='created_at';
            }
            $query->with(['class', 'section'])
          ->when($selectedClass, function($query) use($selectedClass){
            $query->where('class_id',$selectedClass);
         })
          ->when($selectedSection, function($query) use($selectedSection){
            $query->where('section_id',$selectedSection);
         })
          ->orderBy($sort_field, $sort_direction)
            ->search(trim($search_term));
    }

}
