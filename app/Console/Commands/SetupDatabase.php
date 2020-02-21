<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Log;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MYSQL database and run migrate and seed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            // create database
            $databaseName = env('DB_DATABASE', false);
            $charset = config("database.connections.mysql.charset", 'utf8mb4');
            $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');
            config(["database.connections.mysql.database" => null]);
            $query = "CREATE DATABASE IF NOT EXISTS $databaseName CHARACTER SET $charset COLLATE $collation;";
            DB::statement($query);
            config(["database.connections.mysql.database" => $databaseName]);
            ////
            Artisan::call('config:cache'); // Run php artisa config:cache
            Artisan::call('migrate'); // Run php artisa migrate -> Create tables
            Artisan::call('db:seed'); // Run php artisa db:seed -> Insert data to database by faker
            Artisan::call('config:clear'); // Run php artisa config:clear
            ////
            $this->info("Setup databae successfully.");
        } catch (\Throwable $th) {
            Log::debug();
        }
    }
}
