<?php

namespace App\Http\Controllers;

use App\Models\Csv;
use Illuminate\Http\Request;
use SplFileObject;

class CsvController extends Controller
{
    public function index()
    {
        return view('Csv.Csvtop');
    }

    /*
    public function importcheck(Request $request)
    {
        // ロケールを設定(日本語に設定)
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        
        // アップロードしたファイルを取得
        $uploaded_file = $request->file('csv_file');
        
        // アップロードしたファイルの絶対パスを取得
        $file_path = $request->file('csv_file')->path($uploaded_file);
        
        //SplFileObjectを生成
        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV);

    } 
    */   
    
    /**
     * CSVインポート
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        //全件削除
        Csv::query()->delete();

        
        // ロケールを設定(日本語に設定)
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        
        // アップロードしたファイルを取得
        $uploaded_file = $request->file('csv_file');
        
        // アップロードしたファイルの絶対パスを取得
        $file_path = $request->file('csv_file')->path($uploaded_file);
        
        //SplFileObjectを生成
        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV);

        //配列の箱を用意
        $array = [];
        
        $row_count = 1;
            
        foreach ($file as $row)
        {

            if ($row === [null]) continue; 
            
            if ($row_count > 1)
            {
                $email = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                $name_family = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                $name_first = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                $password = mb_convert_encoding($row[3], 'UTF-8', 'SJIS');
            
                $csvimport_array = [
                    'name' => $email, 
                    'name_family' => $name_family, 
                    'name_first' => $name_first, 
                    'password' => $password
                ];

                // つくった配列の箱($array)に追加
                array_push($array, $csvimport_array);
            }

            $row_count++;
        }

        //追加した配列の数を数える
        $array_count = count($array);

        //もし配列の数が500未満なら
        if ($array_count < 500){

            //配列をまるっとインポート(バルクインサート)
            Csv::insert($array);

        } else {
    
            //追加した配列が500以上なら、array_chunkで500ずつ分割する
            $array_partial = array_chunk($array, 500); //配列分割

            //分割した数を数えて
            $array_partial_count = count($array_partial); //配列の数

            //分割した数の分だけインポートを繰り替えす
            for ($i = 0; $i <= $array_partial_count - 1; $i++){
            
                Csv::insert($array_partial[$i]);
            
            }
        }

        return view('Csv.Csvtop');
    }
}

