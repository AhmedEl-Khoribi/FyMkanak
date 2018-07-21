<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteSetting;

class SiteSettingController extends Controller
{
    public function index()
    {
        $infos = SiteSetting::all();

        return view('dashboard.showInfos', compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = SiteSetting::find($id);

        return view('dashboard.editSiteInfo', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'logo'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
            'favicon'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if(file_exists($request->file('logo')))
        {
           $img_name=time() . '.' . $request->logo->getClientOriginalExtension();

           SiteSetting::where('id', $id)->update(['logo'=>$img_name]);
                     
           $request->logo->move(public_path('uploads'), $img_name);

        }

        if(file_exists($request->file('favicon')))
        {
           $img_name2=time() . '.' . $request->favicon->getClientOriginalExtension();

           SiteSetting::where('id', $id)->update(['favicon'=>$img_name2]);
                     
           $request->favicon->move(public_path('uploads'), $img_name2);

        }


        SiteSetting::where('id', $id)->update($request->except(['_token', '_method', 'logo', 'favicon']));

        session()->flash('message', 'Site Information Is Updated');

        return redirect('/admin/site_settings');
    }
}
