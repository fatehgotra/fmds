<?php

namespace App\Imports;

use App\Models\Contact;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
    
        $cid = getCustomerId();
       
        $birthdate =  $row['birth_date_ddmmyyyy'] ?? null;
        $age       = !is_null($birthdate) ?  Carbon::createFromFormat('d/m/Y',$birthdate)->age : null;
        $birthdate = !is_null($birthdate) ?  Carbon::createFromFormat('d/m/Y',$birthdate)->format('m/d/Y') : null;
        $name      = $row['full_name'];
        $phone     = '+'.$row['phone_with_country_code'];
    
        if (!is_null($name) && !is_null($phone)) {
            try{
            return new Contact([
                'customer_id' => $cid,
                'name'       => $name,
                'phone'      => $phone,
                'network'    => $row['network_whatsapp_sms'] ?? 'SMS',
                'gender'     => $row['gender_male_female'] ?? null,
                'email'      => $row['email'] ?? null,
                'birthdate'  => $birthdate,
                'age'        => $age,
                'country'    => $row['country_full_name'],
                'auto_reply' => $row['auto_reply_yesno'],
                'company'    => $row['company_name'],
            ]);
        } catch(Exception $e){
           return redirect()->back()->with('error',$e->getMessage());
        }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
