<?php

namespace App\DTO;

class JurnalEntry{

    public string $kode;
    public string $debit;
    public string $kredit;
    public string $uraian;
    public string $tujuan;

    public function __construct(
        $kode,
        $debit,
        $kredit,
        $uraian,
        $tujuan
    ){
        $this->kode = $kode;
        $this->debit = $debit;
        $this->kredit = $kredit;
        $this->uraian = $uraian;
        $this->tujuan = $tujuan;
    }

}
