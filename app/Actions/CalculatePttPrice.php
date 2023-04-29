<?php

namespace App\Actions;

use Illuminate\Support\Facades\Process;

class CalculatePttPrice {
    public function execute($weight, $width, $height, $length): string
    {
        $weightToKg = $weight * 1000;
        $cmd =  Process::path(app_path('Helpers'))->run("node ptt.js $weightToKg $width $height $length");
        $price =  $cmd->output() ?? '';
        return str_replace('.', ',', $price);

    }
}
