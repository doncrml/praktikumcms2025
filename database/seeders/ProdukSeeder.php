<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'Nama_Produk' => 'T-Shirt Pointsurf',
                'Deskripsi'   => 'T-Shirt berkualitas tinggi dengan desain menarik',
                'Harga'       => 150000,
                'Stok'        => 10,
                'Kategori'    => 'Pakaian',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'Nama_Produk' => 'Kemeja Flanel',
                'Deskripsi'   => 'Kemeja flanel pria dengan bahan nyaman.',
                'Harga'       => 150000,
                'Stok'        => 25,
                'Kategori'    => 'Pakaian',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'Nama_Produk' => 'Dompet Pointsurf',
                'Deskripsi'   => 'Dompet Kulit sintetis dengan emboss logo',
                'Harga'       => 95000,
                'Stok'        => 15,
                'Kategori'    => 'Aksesoris',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
