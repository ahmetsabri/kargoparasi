<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Actions\GetMngLocationsAction;
use App\Actions\GetYurticinLocationsAction;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new GetMngLocationsAction())->execute();
        (new GetYurticinLocationsAction())->execute();
    }
}
