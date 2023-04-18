<?php

namespace App\Http\Resources;

use App\Models\CargoProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $provider = CargoProvider::where('name', strtoupper($this['provider']))->first();
        return [
            'price' => $this['price'],
            'note' => $this['note'] ?? null,
            'logo' => $provider->logo_url,
            'name' => $provider->name,
            'code' => ucfirst($provider->code),
        ];
    }
}
