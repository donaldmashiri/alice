<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;
    protected $fillable = ['reason', 'user_id', 'employment_status', 'documents', 'amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
