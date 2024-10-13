<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Console\Command;

class WhatsappCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:whatsapp-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $contacts = Contact::whereNotNull('phone')->get(['phone']);
        $phones = [];
        if (isset($contacts)) {
            foreach ($contacts as $contact) {
                $phones[] = $contact->phone;
            }
        }
        $response = whatsappExist($phones);
        if (isset($response)) {
            foreach ($response as $num => $res) {
                Contact::wherePhone($num)->update([
                    'network' => $res,
                    'whatsapp_check' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
