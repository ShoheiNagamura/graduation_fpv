<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    /**
     * パイロットのプロフィール内容を表示
     */
    public function edit(Request $request): View
    {
        return view('pilot/profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * プロフィールの更新処理 ------------------------------------------------------------------
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $data = [];
        Log::debug($request);
        try {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $file = $request->file('user_icon');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $store = $file->storeAs('user_images', $filename, 'public');
            $request->merge(["user_image" => $store]);
            // dd($request);

            $previous_icon_path = $request->user()->user_image;
            if ($previous_icon_path) {
                if (File::exists(storage_path('app/public/' . $previous_icon_path))) {
                    $delete = File::delete(storage_path('app/public/' . $previous_icon_path));
                }
            }

            $user = $request->user();
            $user->user_image = $request->user_image;
            $user->save();

            // $request->user()->save();

            return Redirect::route('pilot.profile.edit')->with('status', 'プロフィールを更新しました。');
        } catch (\Exception $e) {
            Log::debug($e);
            $e->getMessage();
            session()->flash('flash_message', '更新が失敗しました');
        }
    }

    /**
     * アカウントの削除処理 -------------------------------------------------------------------
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
