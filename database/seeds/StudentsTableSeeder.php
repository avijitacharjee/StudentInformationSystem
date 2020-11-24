<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $seed = 15;
    	while($seed>0){
    		factory(Student::class, 1)->create();
    		$seed--;
    	}
    }
}
