<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HumanResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        DB::table('departments')->insert([
            [
                'name' => 'HR',
                 'description' => 'Department Human Resource',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],[
                'name' => 'IT',
                 'description' => 'Department Information Tech',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],
            [
                'name' => 'Sales',
                 'description' => 'Department Sales',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR',
                 'description' => 'Handling team',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],
            [
                'title' => 'Developer',
                 'description' => 'Handling codes',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],
            [
                'title' => 'Sales',
                 'description' => 'Handling selling',
                  'status' => 'active',
                   'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(), 
            ],
        ]);

        DB::table('employees')->insert([
            [
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'department_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'department_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);

        DB::table('tasks')->insert([
            [
                'title' => $faker->sentence,
                 'description' => $faker->paragraph,
                  'assigned_to' => 1,
                  'due_date' => Carbon::parse($faker->dateTimeBetween('-1 day', '+1 day')),
                  'status' => 'pending',
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence,
                 'description' => $faker->paragraph,
                  'assigned_to' => 2,
                  'due_date' => Carbon::parse($faker->dateTimeBetween('-1 day', '+1 day')),
                  'status' => 'pending',
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('payroll')->insert([
            [
                'employee_id' => 1,
                 'salary' => $faker->randomFloat(2, 3000, 6000),
                  'bonus' => $faker->randomFloat(2, 3000, 6000),
                   'deduction' => $faker->randomFloat(2, 500, 1000),
                    'net_salary' => $faker->randomFloat(2, 3000, 6000),
                     'pay_date' => Carbon::parse('2026-01-11'),
                       'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                 'salary' => $faker->randomFloat(2, 3000, 6000),
                  'bonus' => $faker->randomFloat(2, 3000, 6000),
                   'deduction' => $faker->randomFloat(2, 500, 1000),
                    'net_salary' => $faker->randomFloat(2, 3000, 6000),
                     'pay_date' => Carbon::parse('2026-01-11'),
                       'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                 'check_in' => Carbon::parse('2026-01-11'),
                  'check_out' => Carbon::parse('2026-01-11'),
                   'date' => Carbon::parse('2026-01-11'),
                   'status' => 'active',
                    'created_at' => Carbon::now(),
                     'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                 'check_in' => Carbon::parse('2026-01-11'),
                  'check_out' => Carbon::parse('2026-01-11'),
                   'date' => Carbon::parse('2026-01-11'),
                   'status' => 'active',
                    'created_at' => Carbon::now(),
                     'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
