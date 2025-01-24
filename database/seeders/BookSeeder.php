<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Laravel for Beginners',
            'author' => 'John Doe',
            'description' => 'Introduction to Laravel framework.',
        ]);

        Book::create([
            'title' => 'Mastering PHP',
            'author' => 'Jane Smith',
            'description' => 'Advanced PHP programming techniques.',
        ]);
    }
}
