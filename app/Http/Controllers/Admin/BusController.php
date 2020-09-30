<?php

namespace App\Http\Controllers\Admin;

use App\Bus;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\BusUpdateRequest;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::latest()->paginate(10);

        return view('admin.bus.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.bus.create');
    }

    public function store(BusStoreRequest $request)
    {
        $bus = Bus::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'seat' => $request->seat,
            'door' => $request->door,
            'bagagge' => $request->bagagge,
            'ac' => $request->ac,
            'gear_shift' => $request->gear_shift,
            'karaoke' => $request->karaoke,
            'tv' => $request->tv,
            'smoking_area' => $request->smoking_area,
        ]);

        if (isset($request->images)) {
            $files = $request->images;
            $destination = public_path('uploads/buses/' . $bus->id . '/');

            foreach ($files as $file) {
                $file_name = $bus->slug . '-' .  substr(str_shuffle('0123456789'), 1, 10) . '.' . $file->getClientOriginalExtension();
                $file->move($destination, $file_name);
                $data[] = $file_name;
            }
            $image_json = json_encode($data);

            $bus->images = $image_json;
            $bus->save();
        }

        Alert::success('Berhasil!', 'Data bus berhasil disimpan!');

        return redirect()->route('admin.bus.index');
    }

    public function show($id)
    {
        $bus = Bus::withTrashed()->findOrFail($id);

        return view('admin.bus.show', compact('bus'));
    }

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);

        return view('admin.bus.edit', compact('bus'));
    }

    public function update(BusUpdateRequest $request, $id)
    {
        $bus = Bus::findOrFail($id);

        $images = json_decode($bus->images);
        $destination = public_path('uploads/buses/' . $bus->id . '/');

        if ($request->hasFile('images')) {
            if (isset($images)) {
                foreach ($images as $val) {
                    $image_path = $destination . $val;
                    File::delete($image_path);
                }

                foreach ($request->images as $file) {
                    $file_name = $bus->slug . '-' .  substr(str_shuffle('0123456789'), 1, 10) . '.' . $file->getClientOriginalExtension();

                    $file->move($destination, $file_name);
                    $data[] = $file_name;
                }
                $images = $data;
            }
        }

        $bus->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'images' => json_encode($images),
            'description' => $request->description,
            'seat' => $request->seat,
            'door' => $request->door,
            'bagagge' => $request->bagagge,
            'ac' => $request->ac,
            'gear_shift' => $request->gear_shift,
            'karaoke' => $request->karaoke,
            'tv' => $request->tv,
            'smoking_area' => $request->smoking_area,
        ]);
        Alert::success('Berhasil!', 'Data bus berhasil diupdate!');

        return redirect()->route('admin.bus.show', [$bus->id, $bus->slug]);
    }

    public function destroy($id)
    {
        Bus::findOrFail($id)->delete();
        Alert::warning('Dihapus!', 'Data bus berhasil dihapus!');
        return back();
    }

    public function trash()
    {
        $buses = Bus::onlyTrashed()->paginate(25);

        return view('admin.bus.trash', compact('buses'));
    }

    public function restore($id)
    {
        Bus::onlyTrashed()->findOrFail($id)->restore();

        Alert::success('Berhasil!', 'Data bus berhasil dikembalikan!');
        return back();
    }

    public function forceDelete($id)
    {
        Bus::onlyTrashed()->findOrFail($id)->forceDelete();
        Alert::warning('Dihapus!', 'Data bus berhasil dihapus permanen!');
        return back();
    }
}
