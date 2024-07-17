<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = new Type();
        $type->name = "Front-end";
        $type->description = "Conoscenza di HTML/CSS/JAVASCRIPT";
        $type->icon = "fa-brands fa-html5";
        
        $type->save();

        $type = new Type();
        $type->name = "Back-end";
        $type->description = "Conoscenza di PHP/LARAVEL";
        $type->icon = "fa-brands fa-html5";
        
        $type->save();

        $type = new Type();
        $type->name = "Full stack";
        $type->description = "Conoscenza di HTML/CSS/JAVASCRIPT/PHP/LARAVEL";
        $type->icon = "fa-brands fa-html5";
        
        $type->save();

        $type = new Type();
        $type->name = "Design";
        $type->description = "Conoscenza LAYOUT/STILE";
        $type->icon = "fa-brands fa-html5";
        
        $type->save();
    }
}
