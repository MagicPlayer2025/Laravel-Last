<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $adminEmail = 'dadad@bk.ru';

        // Удаляем всех старых админов (кроме нового, если он уже существует)
        \App\Models\User::where('is_admin', true)
            ->where('email', '!=', $adminEmail)
            ->delete();

        // Создаем или обновляем нового админа
        \App\Models\User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Администратор',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );

        \App\Models\Product::factory()->count(6)->create();

        \App\Models\Service::firstOrCreate(['name' => 'Диагностика велосипеда'], [
            'description' => 'Полная проверка велосипеда перед сезоном или поездкой.',
            'price' => 1500,
        ]);

        \App\Models\Service::firstOrCreate(['name' => 'Регулировка переключателей'], [
            'description' => 'Точная настройка переднего и заднего переключателя скоростей.',
            'price' => 800,
        ]);

        \App\Models\Service::firstOrCreate(['name' => 'Настройка тормозов'], [
            'description' => 'Обслуживание и регулировка тормозной системы.',
            'price' => 900,
        ]);
    }
}
