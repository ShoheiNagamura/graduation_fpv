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
        try {
            $request->user()->fill($request->validated());
            // dd($request);

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            // ddd($request);
            // die();

            $request->user()->save();
            Log::debug($request);

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
