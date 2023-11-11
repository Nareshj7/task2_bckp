<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database if it does not exist.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');

        try {
            // Check if the database already exists
            DB::connection()->getPdo()->exec("CREATE DATABASE IF NOT EXISTS $databaseName");
            $this->info("Database '$databaseName' created or already exists.");
        } catch (\Exception $e) {
            $this->error("Failed to create database '$databaseName': " . $e->getMessage());
        }
    }
}
