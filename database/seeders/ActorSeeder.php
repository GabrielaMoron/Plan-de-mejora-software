<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\actor;
use File;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Truncar la tabla actors
        // actors::truncate();

        // 2. leer el archivo actors.json
        $json = File::get("database/_data/actor.json");
          // convertir el contenido json en un array
          $arreglo_actor = json_decode($json);

        // 3. leer el archivo y por cada actor 
        foreach ($arreglo_actor as $actor) {
            // 4. Crear un actor por cada uno
            $b = new actor();
            $b->first_name = $actor->first_name;
            $b->last_name = $actor->last_name;
            $b->save();
        }
        
    }

}