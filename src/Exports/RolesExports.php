<?php

namespace Msafiri\RolesReports\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RolesExports implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $arr = array();
        foreach ($this->data as $data) {
            $arr[] = (array)$data;
        }
        return collect($arr);
    }
    public function headings(): array
    {
        return [
            'id',
            'firstname',
            'middlename',
            'lastname',
            'unit',
            'role',
             'permission',
        ];
    }
}
