<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plants;
use Illuminate\Support\Facades\Storage;

class PlantsController extends Controller
{
    public function index(Request $request)
    {
        return Plants::all();
    }

    public function update(Request $request, $id)
    {
//        $response = $request->validate(["id",
//            "kind" => ['required'],
//            "sci_name" => ['required'],
//            "name" => ['required'],
//            "family" => ['required'],
//            "genus" => ['required'],
//            "trunk" => ['required'],
//            "leaf" => ['required'],
//            "bloom" => ['required'],
//            "fruit" => ['required'],
//            "seed" => ['required'],
//            "property" => ['required'],
//            "type" => ['required'],
//            "qrcode" => ['required'],
//            "picture" => ['required'],
//            "cropping" => ['required'],
//            "care" => ['required'],
//            "belief" => ['required'],
//            "clime" => ['required']]);


        $data = $request->input();
        if ($request->hasFile("picture")) {
            $name = $request->file('picture')->store('public/pics/plants');
            $data['picture'] = array_reverse(explode('/', $name))[0];
        } else {
            unset($data["picture"]);

        }

        if ($request->hasFile("qrcode")) {
            $name = $request->file('qrcode')->store('public/pics/qrcode');
            $data['qrcode'] = array_reverse(explode('/', $name))[0];
        } else {
            unset($data["qrcode"]);

        }


        $result = Plants::find($id)->update($data);

        return $result ? redirect()->route('dashboard')->with(['success' => 'อัพเดทข้อมูลสำเร็จ']) :
            redirect()->route('dashboard')->with(['failed' => 'ไม่สามารถอัพเดทข้อมูลได้ กรุณาลองใหม่อีกครั้ง']);


    }

    public function delete(Request $request, $id)
    {
        $result = Plants::find($id)->delete();
        return $result ? redirect()->route('dashboard')->with(['success' => 'ลบข้อมูลสำเร็จ']) :
            redirect()->route('dashboard')->with(['failed' => 'ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง']);
    }

    public function create(Request $request)
    {

        $data = $request->input();
        if ($request->hasFile("picture")) {
            $name = $request->file('picture')->store('public/pics/plants');
            $data['picture'] = array_reverse(explode('/', $name))[0];
        } else {
            unset($data["picture"]);

        }

        if ($request->hasFile("qrcode")) {
            $name = $request->file('qrcode')->store('public/pics/qrcode');
            $data['qrcode'] = array_reverse(explode('/', $name))[0];
        } else {
            unset($data["qrcode"]);

        }

        $result = Plants::create($data);

        return $result ? redirect()->route('dashboard')->with(['success' => 'สร้างข้อมูลสำเร็จ']) :
            redirect()->route('dashboard')->with(['failed' => 'ไม่สามารถสร้างข้อมูลได้ กรุณาลองใหม่อีกครั้ง']);

    }

}
