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
<<<<<<< HEAD
    	$seed = 10;
=======
        $seed = 10;
>>>>>>> ed08f7556e02cae2425eaef1bf7f0578014681b5
    	while($seed>0){
    		factory(Student::class, 1)->create();
    		$seed--;
    	}
<<<<<<< HEAD

    	//factory(Student::class, 10)->create();
        
=======
>>>>>>> ed08f7556e02cae2425eaef1bf7f0578014681b5
    }
}
