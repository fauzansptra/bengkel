<?php

if (!function_exists('format_date')) {
    function format_date($date)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $pecahkan = explode('-', $date);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

if (!function_exists('format_datetime')) {
    function format_datetime($datetime)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $pecahkan = explode(' ', $datetime);
        $tanggal = explode('-', $pecahkan[0]);
        $waktu = $pecahkan[1];
        return $tanggal[2] . ' ' . $bulan[(int)$tanggal[1]] . ' ' . $tanggal[0] . ' ' . $waktu;
    }
}
