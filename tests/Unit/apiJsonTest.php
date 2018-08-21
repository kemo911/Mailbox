<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class apiJsonTest extends TestCase
{
    /**
     * A basic test example.
     * @group getMessages
     * @return void
     */
    public function testMessages()
    {
        $response = $this->json('GET', '/api/messages');
        $response->assertJsonStructure([
            'messages'=>[
                'current_page',
                'data' => [
                    [
                        'uid',
                        'sender',
                        'subject',
                        'message',
                        'time_sent',
                        'archived',
                        'read'
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]
        ]);
    }

    /**
     * A basic test example.
     * @group getArchivedMessages
     * @return void
     */
    public function testArchivedMessages()
    {
        $response = $this->json('GET', '/api/messages/archived');
        $response->assertJsonStructure([
            'messages'=>[
                'current_page',
                'data' => [
                    [
                        'uid',
                        'sender',
                        'subject',
                        'message',
                        'time_sent',
                        'archived',
                        'read'
                    ]
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]
        ]);
    }
}
