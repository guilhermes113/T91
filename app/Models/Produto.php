<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    protected $dates = [
                         'created_at',
                         'updated_at',
                         'deleted_at'
                        ];

    protected $fillable =['id_cliente', 'produto'];

    
        public function tipo()
        {
            return $this->belongsTo(Tipo::class,'id_cliente','id_cliente');
        }
}
