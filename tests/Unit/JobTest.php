<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_belongsToEmployer(): void
    {
        // AAA
        // Arrange
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);

        // Act and Assert
        $this->assertTrue($job->employer->is($employer));
    }

    public function test_canHaveTags(): void
    {
        $job = Job::factory()->create();

        $job->tag('Frontend');

        self::assertCount(1, $job->tags);
    }
}
