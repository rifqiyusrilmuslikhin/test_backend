<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = ['front end', 'back end', 'devops', 'admin', 'fullstack'];

        for($i = 0; $i < count($job); $i++) {
        	$data[] = [
        		'name' => $job[$i]
        	]; 
        }
        (new Jobs())->insert($data);
    }
}
