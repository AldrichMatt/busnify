<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menu;
use App\Models\Bahan;
use Illuminate\Support\Facades\DB;

class JurnalBarang extends Model
{
    use SoftDeletes;

    protected $table = "jurnal_barang";
    //
    protected $fillable = [
        'id_batch',
        'item_id',
        'item_type', //bahan, menu
        'jumlah',
        'arah', //masuk, keluar
        'sumber' //penjualan, pembelian, waste
    ];

    protected $casts = [
        'jumlah' => 'integer'
    ];

    public function item()
    {
        return $this->morphTo();
    }

    public static function generateReStockLogId()
    {
        $today = now()->format('Ymd');

        $lastBatch = JurnalBarang::whereDate('created_at','=',now()->format('Y-m-d'))
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

        return 'RST-' .
            $today . '-' .
            str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public static function generateProductionLogId()
    {
        $today = now()->format('Ymd');

        $lastBatch = JurnalBarang::whereDate('created_at','=',now()->format('Y-m-d'))
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

        return 'PRD-' .
            $today . '-' .
            str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public static function logJurnalBarang($id_batch,$id_barang, $jumlah, $arah, $tipe, $sumber)
    {
        if($id_batch == NULL){
            $id_batch = self::generateProductionLogId();
        };
        return DB::transaction(function () use ($id_batch, $id_barang, $jumlah, $arah, $tipe, $sumber) {

            self::Create(
                [
                    'id_batch' => $id_batch,
                    'item_type' => $tipe,
                    'item_id'   => $id_barang,
                    'jumlah' => $jumlah,
                    'arah'   => $arah,
                    'sumber' => $sumber,
                ]
            );

            if ($tipe === "bahan") {
                Bahan::updateStock($id_barang, $jumlah, $arah);
            }

            return;
        });
    }
}
