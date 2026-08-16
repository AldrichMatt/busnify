<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bahan;
use App\Models\Produksi;

class HPP extends Model
{
    protected $table = 'hpp';
    //
    protected $fillable = [
        'id_produksi',
        'id_barang',
        'takaran',
        'modal'
    ];

    public function bahan()
    {
      return $this->belongsTo(Bahan::class, "id_bahan", "id");
    }
    public function produksi()
    {
      return $this->belongsTo(Produksi::class, "produksi", "id");
    }
    }
