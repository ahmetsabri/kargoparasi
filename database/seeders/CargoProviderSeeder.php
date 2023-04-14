<?php

namespace Database\Seeders;

use App\Enums\CargoProviderEnum;
use App\Models\CargoProvider;
use Illuminate\Database\Seeder;

class CargoProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargoProviders = CargoProviderEnum::cases();

        foreach ($cargoProviders as $cargoProvider) {
            CargoProvider::updateOrCreate([
                'code' => $cargoProvider->value,
            ], [
                'name' => $cargoProvider->name,
                'code' => $cargoProvider->value,
                'logo_url' => config("cargoproviders.{$cargoProvider->name}.logo_url"),
            ]);
        }
    }
}
