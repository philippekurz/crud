<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CpVille;
use Illuminate\Support\Facades\File;

class CpVilleSeeder extends Seeder
{
    public function run(): void
    {
        $file = database_path('data/cp_villes.csv');

        if (!File::exists($file)) {
            $this->command->error("Le fichier cp_villes.csv est introuvable.");
            return;
        }

        $csv = array_map('str_getcsv', file($file));
        $header = array_shift($csv); // sauter l'en-tête

        $rows = [];
        foreach ($csv as $line) {
            $rows[] = [
                'code_postal' => $line[0],
                'ville' => $line[1],
            ];
        }

        $chunks = array_chunk($rows, 1000);
        foreach ($chunks as $chunk) {
            CpVille::insert($chunk);
        }

        $this->command->info("✅ Importation de " . count($rows) . " villes terminée !");
    }
}