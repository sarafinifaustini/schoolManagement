<?php

namespace App\Models;


use App\Models\Attendance;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \DateTimeInterface;

class User extends Authenticatable
{
     public $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;
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


    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function section(){
       return $this->belongsTo(Section::class);
    }
     public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }
     public function getFullNameAttribute()
    {
        return $this->name;
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');

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

    public function scopeStudentsQuery($query){
        $search_term = request('q','');

         $selectedClass = request('selectedClass');
         $selectedSection = request('selectedClass');
         $sort_direction = request('sort_direction','desc');

            if(!in_array($sort_direction,['asc','desc'])){
                $sort_direction="desc";
            }
            $sort_field= request('sort_field','created_at');
            if(!in_array($sort_field,['name','email','phoneNumber','parentName','created_at'])){
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
