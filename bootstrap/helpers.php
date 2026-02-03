<?php
use Illuminate\Support\Str;

function generateRefJurnal()
{
    return 'JR-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
}

if (! function_exists('rupiah')) {
    function rupiah($value)
    {
        return 'Rp ' . number_format($value, 0, '.', ',');
    }
}