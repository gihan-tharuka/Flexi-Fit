<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','user_id', 'last_name', 'email', 'mobile','date', 'time', 'created_at', 'updated_at', 'note'];


    public function save(array $options = [])
    {
        // If the user_id is not set and there's a logged-in user, set the user_id
        if (!$this->user_id && Auth::check()) {
            $this->user_id = Auth::id();
        }

        // Call the parent save method
        return parent::save($options);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
