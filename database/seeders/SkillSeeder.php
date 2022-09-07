<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = ['html', 'css', 'js', 'php', 'java', 'kotlin', 'golang', 'typescript'];

        for($i = 0; $i < count($skill); $i++) {
        	$data[] = [
        		'name' => $skill[$i]
        	]; 
        }
        (new Skills())->insert($data);

    }
}
