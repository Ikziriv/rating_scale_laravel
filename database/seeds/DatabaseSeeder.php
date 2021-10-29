<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->role();
        $this->admin();
        $this->pegawai();
        $this->variable();
        $this->indikator();
        // $this->call(UsersTableSeeder::class);
    }

    public function role()
    {
        $role = App\Role::create([
            'name' => 'Admin',
        ]);
        $role = App\Role::create([
            'name' => 'Direktur',
        ]);
        $role = App\Role::create([
            'name' => 'Pegawai',
        ]);
    }

    public function admin()
    {
        $admin = App\User::create([
            'role_id' => 1,
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }

    public function pegawai()
    {
        $pegawai = App\Pegawai::create([
            'user_id' => 1,
            'name' => 'Imam Sandika',
            'alamat' => 'Jl Raya Mayjen he suma km 12 Cimande Bogor',
            'jenkel' => 'L',
            'tempat' => 'L',
            'tanggal' => 'L',
            'jnskartu' => 'KTP',
            'noiden' => '111209100101',
            'agama' => 'islam',
            'tlp' => '08661312311',
            'status' => 'aktif',
            'nmibu' => 'Tester',
        ]);
    }

    public function variable()
    {
        $variable = App\Variable::create([
            'name' => 'Kehadiran',
        ]);
        $variable = App\Variable::create([
            'name' => 'Pencapaian Targer Kerja',
        ]);
        $variable = App\Variable::create([
            'name' => 'Ketelitian Kerja',
        ]);
        $variable = App\Variable::create([
            'name' => 'Empati',
        ]);
        $variable = App\Variable::create([
            'name' => 'Kerjasama',
        ]);
    }

    public function indikator()
    {
        $indikator = App\Indikator::create([
            'variable_id' => 1,
            'name' => 'Ketepatan waktu',
            'bobot' => '10',
            'nilai' => '24',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 1,
            'name' => 'Jumlah kehadiran',
            'bobot' => '10',
            'nilai' => '24',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 2,
            'name' => 'Pemenuhan Deadline',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 2,
            'name' => 'Menerima tanggung jawab',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 3,
            'name' => 'Perhatian terhadap K3',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 3,
            'name' => 'Perhatian terhadap alat kerja',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 3,
            'name' => 'Perhatian terhadap dokumen',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 4,
            'name' => 'Respon terhadap rekan kerja',
            'bobot' => '8',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 4,
            'name' => 'Mengendalikan emosi',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 5,
            'name' => 'Menjaga hubungan baik dengan TIM',
            'bobot' => '9',
            'nilai' => '10',
        ]);
        $indikator = App\Indikator::create([
            'variable_id' => 4,
            'name' => 'Mematuhi peraturan Yayasan',
            'bobot' => '9',
            'nilai' => '10',
        ]);
    }
}
