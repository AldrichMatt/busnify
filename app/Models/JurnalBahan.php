<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menu;
use App\Models\Bahan;
use Illuminate\Support\Facades\DB;

class JurnalBahan extends Model
{
    use SoftDeletes;

    protected $table = "jurnal_bahan";
    //
    protected $fillable = [
        'id_batch',
        'id_bahan',
        'jumlah',
        'arah', //masuk, keluar
        'sumber' //penjualan, pembelian, waste
    ];

    protected $casts = [
        'jumlah' => 'integer'
    ];

    public static function generateBahanLogId()
    {
        $today = now()->format('Ymd');

        $lastBatch = JurnalBahan::whereDate('created_at','=',now()->format('Y-m-d'))
            ->orderByDesc('id')
            ->first();

        $number = 1;

        if ($lastBatch) {

            $lastNumber = (int) substr(
                $lastBatch->id_batch,
                -4
            );

            $number = $lastNumber + 1;
        }

        return 'BHN-' .
            $today . '-' .
            str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public static function logJurnalBahan($id_batch, $id_bahan, $jumlah, $arah, $sumber)
    {
        if($id_batch == NULL){
            $id_batch = self::generateBahanLogId();
        };
        return DB::transaction(function () use ($id_batch, $id_bahan, $jumlah, $arah, $sumber) {

            self::Create(
                [
                    'id_batch' => $id_batch,
                    'id_bahan'   => $id_bahan,
                    'jumlah' => $jumlah,
                    'arah'   => $arah,
                    'sumber' => $sumber,
                ]
            );
            Bahan::updateStock($id_bahan, $jumlah, $arah);

            return;
        });
    }
}
