<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

use App\Models\Profilehistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
     public function edit(Request $request){
        //IDから取得
        $profile = Profile::find($request->id);
        //nullならエラーを出力
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['form' => $profile]);
    }
    
     public function update(Request $request)
    {
        //validation
        $this->validate($request, Profile::$rules);
        //対応するIDを取得
        $profiles = Profile::find($request->id);
        //formに入力された全てを取得
        $form = $request->all();
        
        //フォームから送信された_token削除(csrfセキュリティ)
        unset($form['_token']);
        
        //保存
        $profiles->fill($form)->save();
        
        //編集履歴
        $profilehistory = new Profilehistory();
        $profilehistory->profile_id = $profiles->id;
        $profilehistory->edited_at = Carbon::now();
        $profilehistory->save();
        
        return redirect('admin/profile/edit?id=' . $profiles->id);
    }
}
