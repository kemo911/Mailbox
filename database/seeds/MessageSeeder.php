<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string = file_get_contents(public_path('js/messages_sample.json'));
        $json_file = json_decode($string, true);
        foreach ($json_file as $row){
            foreach ($row as $att){
                Message::create(array(
                    'sender' => $att['sender'],
                    'subject' => $att['subject'],
                    'message' => $att['message'],
                    'time_sent' => $att['time_sent']
                ));
            }
        }
    }
}
