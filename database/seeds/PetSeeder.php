<?php

use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // De esta forma se agrega de forma unitaria el registro
      DB::table('pets')->insert([
        'name' => Str::random(5),
        'tag' => Str::random(5),
      ]);


      // Para modificar lacantidad de registros solo cambiar el numero por la cantidad a agregar
      for($i = 0;$i < 10;$i++){
        DB::table('pets')->insert([
          'name' => Str::random(5), // Agrega una cadena aleatoria de 5 caracteres alfanumeticos
          'tag' => Str::random(5), // Agrega una cadena aleatoria de 5 caracteres alfanumeticos
        ]);
      }

      //para agregar datos desde un array
      $pets = [ 'Firus' => 'Perro',  'Don Gato' => 'Gato', 'Cerebro' => 'Raton', 'Piolin' => 'Canario', 'Dino' => 'Dinosuario'];

      foreach($pets as $name => $tag){
        DB::table('pets')->insert([
          'name' => $name,
          'tag' => $tag, 
        ]);
      }
    }
}
