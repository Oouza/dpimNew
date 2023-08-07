<?php

namespace App\Imports;

use App\Models\typeMineral;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TypeMineralImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new typeMineral([
            'tm_no'         => $row['code_type_mineral'],
            'tm_name'       => $row['name_type_mineral'],
            'tm_userCreate' => Auth::user()->name,
            'tm_userUpdate' => Auth::user()->name,
        ]);
    }
}
