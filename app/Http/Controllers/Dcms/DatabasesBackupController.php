<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\DM_Helpers\DM_db_backup_Library;

class DatabasesBackupController extends DM_BaseController
{
    protected $panel = 'DB Backup';
    protected $base_route = 'dcms.database';
    protected $view_path ='dcms.database';
    protected $model;
    protected $table;
    protected $folder = 'DB_Backup';
    protected $file_path;
    protected $username;
    protected $password;
    protected $dbname;
    protected $filename;
    protected $dbBackup;

    public function __construct(DM_db_backup_library $DB_Backup) {
        $this->middleware('auth');
        $this->middleware('permission:database-table-list', ['only' => ['index']]);
        $this->middleware('permission:database-backup-download', ['only' => ['databaseDownload']]);
        $this->middleware('permission:database-backup-in-server', ['only' => ['databaseBackup']]);
        $this->file_path = getcwd() . DIRECTORY_SEPARATOR . 'BACKUP' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;   
        $this->username = config('database.connections.mysql.username');
        $this->password = config('database.connections.mysql.password');
        $this->dbname = config('database.connections.mysql.database');
        $this->filename = $this->dbname.'_'.date("d-M-Y-G-i-s");    
        $this->dbBackup = $DB_Backup;
    }

    public function index() {
        $conn = $this->dbBackup->connect("localhost", $this->username, $this->password, $this->dbname);
        $data['rows'] = $this->dbBackup->tables($conn);
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    /**
     * Database Download to the Users Computer
     * 
     */
    public function databaseDownload() {
        $conn = $this->dbBackup->connect("localhost", $this->username, $this->password, $this->dbname);
        $this->dbBackup->backup($conn);
        $this->dbBackup->download($this->filename);
    }

    /** Database Backup on server  */
    public function databaseBackup() {
        $conn = $this->dbBackup->connect("localhost", $this->username, $this->password, $this->dbname);
        $this->dbBackup->backup($conn);
        $check = $this->dbBackup->save($this->file_path, $this->filename);
        if($check){
            session()->flash('alert-success', $this->panel.' Successfully done');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be done');
        }
        return redirect()->route($this->base_route.'.index');
    }
  
}
