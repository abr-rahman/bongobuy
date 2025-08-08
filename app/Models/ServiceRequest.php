<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $table = "service_requests";
    protected $fillable = [
        'id', 'name', 'phone', 'email', 'register_fee', 'payment_status', 'payment_method', 'tnx_id', 'payment_id', 'account_type', 'status', 'approve_by_id', 'created_at', 'updated_at'
    ];
}
