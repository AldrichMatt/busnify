<?php

namespace App\DTO;

class JurnalEntry{

    public mixed $kode;
    public int $debit;
    public int $kredit;
    public String $uraian;
    public String $tujuan;

    public function __construct(
        mixed $kode,
        int $debit,
        int $kredit,
        String $uraian,
        String $tujuan
    ){
        $this->kode = $kode;
        $this->debit = $debit;
        $this->kredit = $kredit;
        $this->uraian = $uraian;
        $this->tujuan = $tujuan;
    }

}
