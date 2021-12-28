<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \DateTimeInterface;
class Attendance extends Model
{
    use HasFactory;
    public $table = 'attendances';

    protected $dates = [
        'event_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_date',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date;
        // ->format('Y-m-d H:i:s');

    }

    public function getEventDateAttribute($value)
    {
        return $value ;
        // ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setEventDateAttribute($value)
    {
        $this->attributes['event_date'] = $value;
        // ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

     public function subject(){
       return $this->belongsTo(Subject::class);
    }

     public function student(){
       return $this->belongsTo(User::class);
    }
    
}
