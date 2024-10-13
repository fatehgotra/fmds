<?php

namespace App\Exports;

use App\Models\Contact;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ContactExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }
    public function collection()
    {  
         $contacts = Contact::whereCustomerId(getCustomerId())->get();

         $contacts =  $contacts->map(function ($contact) {
            $data = [];
            foreach ($this->columns as $column) {

                if ($column === 'team') {
                    $data['Team'] = $contact->team?->name ?? 'NA';
                } else if($column === 'birthdate'){
                    $data['Birthdate'] =  Carbon::parse($contact->birthdate)->format('d/m/Y');
                }
                else {
                    $data[$column] = $contact->$column; 
                }
            }
            return (object)$data; 
        });

        return $contacts;
    }

    public function headings(): array
    {

        return $this->columns; 
    }
}
