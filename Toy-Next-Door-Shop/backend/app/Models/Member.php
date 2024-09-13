<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    public function mem() 
    {
        return $this->belongsTo(Member::class, 'member_id');  
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
