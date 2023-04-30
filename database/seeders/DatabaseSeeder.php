<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('admin_profiles')->insert([
//            'type' => 'Admin',
////            'profile_photo_path' => '/img/profile/team-3.jpg',
//        ]);
//        DB::table('customer_profiles')->insert([
//            'TTL' => '2023-04-02',
//            'address' => 'Lilac Cottage',
////            'profile_photo_path' => '/img/profile/team-3.jpg',
//            'profile_ktp_photo_path' => 'public/img/profile/team-3',
//        ]);
//        DB::table('users')->insert([
//            'username' => 'admin',
//            'firstname' => 'john',
//            'lastname' => 'doe',
//            'gender' => 'Male',
//            'email' => 'admin@argon.com',
//            'profile_type' => 'App\Models\AdminProfile',
//            'profile_id' => '1',
//            'password' => bcrypt('secret'),
//            'profile_photo_path' => '/img/profile/team-3.jpg',
//        ]);
//        DB::table('users')->insert([
//            'username' => 'admin2',
//            'firstname' => 'jane',
//            'lastname' => 'doe',
//            'gender' => 'Female',
//            'email' => 'admin@admin.com',
//            'profile_type' => 'App\Models\CustomerProfile',
//            'profile_id' => '2',
//            'password' => bcrypt('admin'),
//            'profile_photo_path' => '/img/profile/team-3.jpg',
//        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'idtype' => 'Admin',
            'firstname' => 'john',
            'lastname' => 'doe',
            'gender' => 'Male',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'profile_photo_path' => '/img/profile/team-3.jpg',
            'TTL' => '2023-04-02',
            'address' => 'DKI Jakarta no 1',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
            'postal' => '1111',
            'profile_ktp_photo_path' => '1-KTP.jpg',
        ]);
        DB::table('users')->insert([
            'username' => 'customer',
            'idtype' => 'Customer',
            'firstname' => 'jane',
            'lastname' => 'doe',
            'gender' => 'Female',
            'email' => 'customer@customer.com',
            'password' => bcrypt('customer'),
            'profile_photo_path' => '/img/profile/team-3.jpg',
            'TTL' => '2023-04-02',
            'address' => 'DKI Jakarta no 2',
            'city' => 'Bogor',
            'country' => 'Indonesia',
            'postal' => '1111',
            'profile_ktp_photo_path' => '2-KTP.jpg',
        ]);











        DB::table('data_barangs')->insert([
            'Nama' => 'Nin Jiom Pei Pa Koa',
            'Deskripsi' => 'Melegakan tenggorokan, batuk, batuk berdahak, dan suara hilang. Sinde Obat Batuk Ibu & Anak 300 ml membantu memelihara kesehatan fungsi paru-paru.',
            'Jenis' => 'Obat Batuk & Pilek',
            'Stok' => '50',
            'Harga_Beli' => '68750',
            'Harga_Jual' => '75000',
            'image' => 'IbuAnak.png',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'Panadol Hijau',
            'Deskripsi' => 'PANADOL FLU & BATUK merupakan obat batuk dan pereda flu dengan kandungan Paracetamol, Phenylephrine HCl, dan Dextromethorphan HBr.',
            'Jenis' => 'Obat Batuk & Pilek',
            'Stok' => '50',
            'Harga_Beli' => '17000',
            'Harga_Jual' => '15800',
            'image' => 'Panadol.jpg',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'BISOLVON',
            'Deskripsi' => 'Obat ini digunakan untuk mengatasi batuk berdahak yang bekerja sebagai sekretolitik (mukolitik) dan ekspektoran untuk meredakan batuk berdahak dan mempermudah pengeluaran dahak pada saat batuk.',
            'Jenis' => 'Obat Batuk & Pilek',
            'Stok' => '50',
            'Harga_Beli' => '51000',
            'Harga_Jual' => '57000',
            'image' => 'Bisolvon.jpg',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'Obat Batuk Hitam',
            'Deskripsi' => 'OBH IKA merupakan Obat Batuk Hitam dengan kandungan succus liquiritiae, ammonium chloride, dan sasa. Obat ini digunakan untuk mengobati batuk berdahak dengan cara memudahkan pengeluaran dahak.',
            'Jenis' => 'Obat Batuk & Pilek',
            'Stok' => '50',
            'Harga_Beli' => '20000',
            'Harga_Jual' => '22000',
            'image' => 'OBH.jpg',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'Vicks 44',
            'Deskripsi' => 'Vicks Formula 44 merupakan obat yang digunakan untuk mengatasi batuk tidak berdahak dan meringankan pilek.',
            'Jenis' => 'Obat Batuk & Pilek',
            'Stok' => '50',
            'Harga_Beli' => '17000',
            'Harga_Jual' => '21000',
            'image' => 'Viks44.png',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'PONSTAN',
            'Deskripsi' => 'Asam mefenamat digunakan untuk menghilangkan rasa nyeri ringan sampai dengan sedang akibat berbagai kondisi.',
            'Jenis' => 'Obat Sakit Gigi',
            'Stok' => '50',
            'Harga_Beli' => '25000',
            'Harga_Jual' => '28000',
            'image' => 'Ponstan.jpg',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'GUMAFIXA',
            'Deskripsi' => 'Obat Sakit Gigi Paling Ampuh, Cepat Sembuhkan Sakit Gigi.',
            'Jenis' => 'Obat Sakit Gigi',
            'Stok' => '50',
            'Harga_Beli' => '130000',
            'Harga_Jual' => '175000',
            'image' => 'Gumafixa.png',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'Norit',
            'Deskripsi' => 'Norit tablet adalah obat herbal yang berkhasiat untuk mengobati gangguan pencernaan, seperti sering buang air besar (diare), perut kembung, dan kram perut.',
            'Jenis' => 'Obat Diare',
            'Stok' => '50',
            'Harga_Beli' => '15000',
            'Harga_Jual' => '17000',
            'image' => 'Norit.jpg',
        ]);
        DB::table('data_barangs')->insert([
            'Nama' => 'IMODIUM',
            'Deskripsi' => 'IMODIUM 2 MG TABLET merupakan obat antidiare dengan kandungan Loperamid HCl 2 mg. Obat ini dapat digunakan untuk mengobati diare akut dan kronis.',
            'Jenis' => 'Obat Diare',
            'Stok' => '50',
            'Harga_Beli' => '90000',
            'Harga_Jual' => '110000',
            'image' => 'Imodium.jpg',
        ]);
    }
}
