<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccessKey;


class AccessKeySeeder extends Seeder
{
    public function run(): void
    {
        AccessKey::create([
            'key' => 'CHAVE-DOCENTE-123',
            'role' => 'docente',
        ]);

        AccessKey::create([
            'key' => 'CHAVE-COORD-456',
            'role' => 'coordenador',
        ]);
    }
}
