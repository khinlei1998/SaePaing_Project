<?php
namespace App\Http\Controllers;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public function missionImageUpload($folder,$file)
    {
        $path = $file->store($folder, 'public');
        return $path;
    }

    public function removeImage(Request $request)
    {
        $mission = Mission::find($request->mission_id);
        $mission->attach_files = str_replace($request->src . ":", "", $mission->attach_files);
        $mission->attach_files = str_replace($request->src, "", $mission->attach_files);
        if ($mission->save()) {
            Storage::disk('public')->delete($request->src);
            return response()->json([
                'success' => "true"
            ]);
        } else {
            return response()->json([
                'success' => "false"
            ]);
        }
    }
}
