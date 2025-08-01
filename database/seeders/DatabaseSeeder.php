<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Building;
use App\Models\Room;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Rent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        { {
            }
        }
        // \Ap{{ p\Mo }}dels\User::factory()->create([
        //    {{  'na }}me' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'nomor_induk' => '21312131',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('mahasiswa'),
            'nomor_induk' => '21312109',
            'role_id' => 2,
        ]);

        Faculty::create([
            'code' => 'FTIK',
            'name' => 'Fakultas Teknik dan Ilmu Komputer',
        ]);
        Faculty::create([
            'code' => 'FEB',
            'name' => 'Fakultas Ekonomi Bisnis',
        ]);
        Faculty::create([
            'code' => 'FSIP',
            'name' => 'Fakultas Sastra dan Ilmu Pendidikan',
        ]);

        Building::create([
            'code' => 'ged-a',
            'name' => 'Gedung A',
            'faculty_id' => 2,
        ]);

        Building::create([
            'code' => 'ged-gsg',
            'name' => 'Gedung GSG',
            'faculty_id' => 1,
        ]);

        Building::create([
            'code' => 'ged-ict',
            'name' => 'Gedung ICT',
            'faculty_id' => 1,
        ]);

        Building::create([
            'code' => 'ged-b',
            'name' => 'Gedung B',
            'faculty_id' => 3,
        ]);

        Room::create([
            'code' => 'A1-412',
            'name' => 'A1-412',
            'img' => 'assets/images/ruang/A1-412.jpg',
            'floor' => 2,
            'status' => false,
            'capacity' => 50,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 2,
        ]);

        
        Room::create([
            'code' => 'A1-414',
            'name' => 'A1-414',
            'img' => 'assets/images/ruang/A1-414.jpg',
            'floor' => 2,
            'status' => false,
            'capacity' => 50,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 2,
        ]);

        Room::create([
            'code' => 'A1-507',
            'name' => 'A1-507',
            'img' => 'assets/images/ruang/A1-507.jpg',
            'floor' => 3,
            'status' => false,
            'capacity' => 50,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 2,
        ]);
        
        Room::create([
            'code' => 'A2-302',
            'name' => 'A2-302',
            'img' => 'assets/images/ruang/A2-302.jpg',
            'floor' => 3,
            'status' => false,
            'capacity' => 50,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 2,
        ]);

        Room::create([
            'code' => 'A2-303',
            'name' => 'A2-303',
            'img' => 'assets/images/ruang/A2-303.jpg',
            'floor' => 3,
            'status' => false,
            'capacity' => 50,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 1,
        ]);

        Room::create([
            'code' => 'A2-403',
            'name' => 'A2-403',
            'img' => 'assets/images/ruang/A2-403.jpg',
            'floor' => 3,
            'status' => false,
            'capacity' => 40,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 1,
        ]);
        


        Room::create([
            'code' => 'A2-502',
            'name' => 'A2-502',
            'img' => 'assets/images/ruang/A2-502.jpg',
            'floor' => 2,
            'status' => false,
            'capacity' => 40,
            'type' => 'Lab Komputer',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 1,
        ]);

         Room::create([
            'code' => 'A2-503',
            'name' => 'A2-503',
            'img' => 'assets/images/ruang/A2-503.jpg',
            'floor' => 4,
            'status' => false,
            'capacity' => 100,
            'type' => 'Aula',
            'description' => 'Laboratorium kampus adalah fasilitas vital dalam lingkungan pendidikan tinggi, menyediakan lingkungan yang didedikasikan untuk eksperimen, riset, dan kegiatan praktis di berbagai bidang studi.',
            'building_id' => 1,
        ]);

        

    }
}
