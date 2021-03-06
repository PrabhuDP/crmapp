<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class CustomerMobile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customer_mobile';
    protected $fillable = [
        'company_id',
        'mobile_no',
        'contact_type_id',
        'description',
        'status',
        'added_by',
        'updated_by',
        'customer_id',
    ];
}
