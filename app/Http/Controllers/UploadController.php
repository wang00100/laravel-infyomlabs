<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UploadController extends AppBaseController
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the staff.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
      if ($request->hasFile('file')){
        // $validatedData = $request->validate([
        //   'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg,mp4|max:2048'
        // ]);

        $imageName = time().'.'.$request->file('file')->extension();
        $file = $request->file('file')->move(public_path('/uploads/' . date('Y-m-d').'/'),$imageName);
        $file_url = '/uploads/' . date('Y-m-d').'/'.$imageName;
        //上传的头像字段file是文件类型
        // $file = Storage::url($file);//就是很简单的一个步骤
        Flash::success('Upload successfully.');
        return $this->sendResponse($file_url, 'Upload successfully.');
      }
      return $this->sendError('file not found.');

    }

}
