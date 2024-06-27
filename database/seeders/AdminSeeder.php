<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ($this->userRepository->exists(['email' => 'admin@admin.com'])) {
            return;
        }
        $this->userRepository->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
            'is_admin' => true,
        ]);
    }
}
