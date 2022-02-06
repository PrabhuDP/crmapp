<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'country_name',
        'dial_code',
        'country_code',
        'currency',
        'description',
        'iso',
        'added_by',
        'status'
    ];

    public function scopeLatests( Builder $query ) {
        return $query->orderBy( static::CREATED_AT, 'desc' );
    }

    public function scopeSearch( Builder $query, $search ) {

        if( empty( $search ) ) {
            return $query;
        }

        return  $query->where( function( $query ) use( $search ) {
                    $query->where( 'country_name', 'like', "%{$search}%" )
                        ->orWhere( 'dial_code', 'like', "%{$search}%" )
                        ->orWhere( 'country_code', 'like', "%{$search}%" )
                        ->orWhere( 'currency', 'like', "%{$search}%" )
                        ->orWhere( 'iso', 'like', "%{$search}%" );
                }); 
    }
}
