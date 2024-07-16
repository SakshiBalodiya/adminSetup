<?php

namespace App\Helper;

// use App\Product;


use App\Helpers\AppHelper as Helper;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromCollection, WithHeadings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /*public function map($row): array
    {
        return array_map('trim', $row['barcode']);
    }*/
    
    
   protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
         $user=DB::table('attendances as AT')
         ->leftJoin('users as U','U.id','AT.userId')
         ->where('AT.userId', $this->userId)
         ->get(['U.name','U.email', 'AT.status','U.mobileNo', 'AT.date_time', 'AT.created_at' ]);
        
        return $user;

        
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Staff_name',
            'Email',
            'Status',
            'Contact_no',
            'Time',
            'Created At'
          
        ];
    }
}




