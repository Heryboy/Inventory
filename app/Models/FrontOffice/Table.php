<?php

namespace App\Models\FrontOffice;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table='pos_tables';
    protected $primaryKey='id';

    protected $fillable=[
        'pos_outlets_id',
        'name',
        'pax',
        'is_table',
        'description',
        'status',
        'font_size',
        'width',
        'height',
        'table_shape',
        'position_x',
        'position_y',
        'background_color',
        'background_url',
        'text_color',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public $timestamps=false;

    
}
