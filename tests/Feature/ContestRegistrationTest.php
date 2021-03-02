<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\WelcomeContestMail;
use Illuminate\Support\Facades\Mail;
use App\Events\NewEntryReceivedEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContestRegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void 
    {
        parent::setUp();

        // Event::fake([
        //     NewEntryReceivedEvent::class
        // ]);

        Mail::fake();
    }

    /** @test */
    public function an_email_can_be_entered_into_the_contest()
    {
        // $this->withoutExceptionHandling();

        $this->post('/contest',[
            'email' => 'abc@abc.com'
        ]);

        $this->assertDatabaseCount('contest_entries', 1);
    }

    /** @test */
    public function email_is_required()
    {
        // $this->withoutExceptionHandling();

        $this->post('/contest',[
            'email' => ''
        ]);

        $this->assertDatabaseCount('contest_entries', 0);
    }

    /** @test */
    public function email_is_valid_email()
    {
        // $this->withoutExceptionHandling();

        $this->post('/contest',[
            'email' => 'asdfasdfa'
        ]);

        $this->assertDatabaseCount('contest_entries', 0);
    }

    /** @test */
    public function an_event_can_be_fired()
    {
        $this->withoutExceptionHandling();

        Event::fake();

        $this->post('/contest',[
            'email' => 'abc@abc.com'
        ]);

        Event::assertDispatched(NewEntryReceivedEvent::class);
    }

    /** @test */
    public function a_welcome_email_is_sent()
    {
        // $this->withoutExceptionHandling();
        $this->post('/contest',[
            'email' => 'abc@abc.com'
        ]);

        Mail::assertQueued(WelcomeContestMail::class);
    }
    
}
