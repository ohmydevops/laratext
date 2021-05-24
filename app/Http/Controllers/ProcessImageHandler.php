<?php

namespace App\Http\Controllers;

use App\Services\ImageToText;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProcessImageHandler extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'imageFile' => 'required|mimes:jpg,png|max:1024',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imagePath = $request->file('imageFile')->getRealPath();

        try {
            $result = ImageToText::getTextFromImage($imagePath);
            if($result === '') {
                $result = '🔴 در این تصویر متنی یافت نشد';
            }
        } catch (Throwable) {
            return back()->with('result', 'متاسفانه در پردازش تصویر مشکلی ایجاد شد. مجدد تلاش کنید.');
        }

        return back()->with('result', nl2br($result));
    }
}
