<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\DM_Helpers\DM_db_backup_library;

class DM_BackupDatabase extends Command
{
    protected $folder = 'DB_Backup';
    protected $file_path;
    protected $username;
    protected $password;
    protected $dbname;
    protected $filename;
    protected $dbBackup;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DM_db_backup_library $DB_Backup)
    {
        parent::__construct();
        $this->file_path = getcwd() . DIRECTORY_SEPARATOR . 'public' .  DIRECTORY_SEPARATOR . 'BACKUP' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;   
        $this->username = config('database.connections.mysql.username');
        $this->password = config('database.connections.mysql.password');
        $this->dbname = config('database.connections.mysql.database');
        $this->filename = $this->dbname.'_'.date("d-M-Y-G-i-s");    
        $this->dbBackup = $DB_Backup;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $conn = $this->dbBackup->connect("localhost", $this->username, $this->password, $this->dbname);
        $this->dbBackup->backup($conn);
        $check = $this->dbBackup->save($this->file_path, $this->filename);
        if($check){
            $this->info('Your Backup is being saved.');
        }else {
            $this->info('Warning!! Your Backup is not saved.');
        }
    }
}
