<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Admin;
        $obj->name = "Bijoy Sarker";
        $obj->email = "bijoybp@gmail.com";
        $obj->photo = "admin.jpg";
        $obj->password = FacadesHash::make('123456');
        $obj->token = "";
        $obj->save();
    }
}
