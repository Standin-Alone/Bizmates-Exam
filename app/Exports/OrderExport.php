<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OrderExport implements FromCollection, WithHeadings
{

    protected $orders,$headers;
    
    /**
     * Customer Invoice Report
     */
    public function __construct($orders,$headers)
    {

        $this->orders = $orders;
        $this->headers = $headers;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        return collect($this->orders);
    }

    public function headings(): array
    {
        return $this->headers;
    }
}
