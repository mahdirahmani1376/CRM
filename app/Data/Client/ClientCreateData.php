<?php

namespace App\Data\Client;

use Spatie\LaravelData\Data;

class ClientCreateData extends Data
{
    public function __construct(
        public string $company,
        public int $vat,
        public string $address,
    ) {
    }

    public static function rules(array $payload): array
    {
        return [
            'company' => ['required', 'string'],
            'vat' => ['required', 'int'],
            'address' => ['required'],
        ];
    }
}
