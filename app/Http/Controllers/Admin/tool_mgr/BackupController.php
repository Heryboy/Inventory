<?php namespace App\Http\Controllers\Admin\tool_mgr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class BackupController extends Controller
{
  public $view_title = "tool_mgr/backup.entry_title";
    
  public function __construct()
  {
    
  }

  public function backup_list()
  {
    $db_tables = DB::select('SHOW TABLES');
    return view('admin/tool_mgr/tool/backup')
              ->with('view_title',$this->view_title)
              ->with('db_tables',$db_tables);
  }

  public function backup(Request $request){
    $backup = $request->all();
    if (!isset($backup['backup'])){
      echo "Failed to backup data";
    }else{
      header('Pragma: public');
      header('Expires: 0');
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="' . env('DB_DATABASE') . '_' . date('Y-m-d_H-i-s', time()) . '_backup.sql"');
      echo $this->getBackup($backup['backup']);
      // header('Content-Transfer-Encoding: binary');
    }
  }

  public function getBackup($tables){
    $output = '';
    $DB_PREFIX = env("DB_PREFIX");

    foreach ($tables as $table) {
      if ($DB_PREFIX) {
        if (strpos($table, $DB_PREFIX) === false) {
          $status = false;
        } else {
          $status = true;
        }
      } else {
        $status = true;
      }
      if ($status) {
        $output .= 'TRUNCATE TABLE `' . $table . '`;' . "\n\n";
        $query = "SELECT * FROM `" . $table . "`";
        // DB::select(
        $objects = DB::select($query);
        // foreach ($object as $objects) {
          # code...
          // ###############  Get Field As Array ###############
          
          $data_fields = array_map(function($objects){
            return (array) $objects;
          }, $objects);

          
          // echo count($data_fields);
          foreach ($data_fields as $keys) {
            $fields = '';
            foreach (array_keys($keys) as $value) {
              $fields .= '`' . $value . '`, ';
            }
            $values = '';
            foreach (array_values($keys) as $value) {
              $value = str_replace(array("\x00", "\x0a", "\x0d", "\x1a"), array('\0', '\n', '\r', '\Z'), $value);
              $value = str_replace(array("\n", "\r", "\t"), array('\n', '\r', '\t'), $value);
              $value = str_replace('\\', '\\\\',  $value);
              $value = str_replace('\'', '\\\'',  $value);
              $value = str_replace('\\\n', '\n',  $value);
              $value = str_replace('\\\r', '\r',  $value);
              $value = str_replace('\\\t', '\t',  $value);
              $values .= '\'' . $value . '\', ';
            }
            
            // echo $values;
            $output .= 'INSERT INTO `' . $table . '` (' . preg_replace('/, $/', '', $fields) . ') VALUES (' . preg_replace('/, $/', '', $values) . ');' . "\n";
          }

        $output .= "\n\n";
      }
    }

    return $output;
  }


  public function restore(Request $request){
    $data = $request->all();
    $file = Input::file('import');
    // dd($data);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (is_uploaded_file($file)) {
        $content = file_get_contents($file);
      } else {
        $content = false;
      }

      if ($content) {
        $this->restore_sql($content);
        return redirect("admin/tool_mgr/backup_list")->with('message','Import Successfully');
      } else {
        return redirect("admin/tool_mgr/backup_list")->with('message','Problem while import data or you may not browse file to import!');
      }
    }
  }


  public function restore_sql($sql) {
    foreach (explode(";\n", $sql) as $sql) {
      $sql = trim($sql);

      if ($sql) {
        // $this->db->query($sql);
        DB::statement($sql);
      }
    }

    // $this->cache->delete('*');
  }



}
