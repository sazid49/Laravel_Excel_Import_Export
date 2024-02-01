<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportUser implements FromCollection,WithHeadings,ShouldAutoSize
{   
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email')->get();
    }
    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());
    }
}
