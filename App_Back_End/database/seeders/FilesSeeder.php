<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::insert([
            ['filename' => 'file1.pdf', 'path' => '/files/file1.pdf'],
            ['filename' => 'file2.pdf', 'path' => '/files/file2.pdf'],
            ['filename' => 'file3.pdf', 'path' => '/files/file3.pdf'],
            ['filename' => 'file4.pdf', 'path' => '/files/file4.pdf'],
            ['filename' => 'file5.pdf', 'path' => '/files/file5.pdf'],
        ]);
    }
}
