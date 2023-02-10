<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function upload(Project $project, Request $request)
    {
        $file = $request->file('file');
        $project->addMedia($file)->toMediaCollection();

        return redirect()->back();
    }

    public function download($mediaId)
    {
        return Media::findOrFail($mediaId);
    }

    public function destroy($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        $media->delete();

        return redirect()->back();
    }
}
