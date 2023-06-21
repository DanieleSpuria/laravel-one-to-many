<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['FrontEnd', 'BackEnd', 'Full-Stack', 'Project Manager'];

        foreach($data as $type) {
          $new_type = new Type();
          $new_type->name = $type;
          $new_type->slug = Type::generateSlug($new_type->name);
          $new_type->save();
        }
    }
}
