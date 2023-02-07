<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\BaseTestCase\BaseTestCase;
use Tests\TestCase;

class ProjectControllerTest extends BaseTestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_upload_files()
    {
        $client = Client::factory()->create();
        $project = Project::factory()->create(['client_id' => $client->id]);
        Storage::fake('photos');
        $media = UploadedFile::fake()->image('photo.jpg');
        $mediaName = $media->getClientOriginalName();
        $response = $this->post(route('media.upload',$project->id),['file' => $media]);
        Storage::disk('photos')->assertExists('1/'.$media->getClientOriginalName());
    }

}
