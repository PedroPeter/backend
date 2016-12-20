<?php

use Illuminate\Database\Seeder;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Evento::class, 10)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Artista::class)->make());
        });
    }
}
