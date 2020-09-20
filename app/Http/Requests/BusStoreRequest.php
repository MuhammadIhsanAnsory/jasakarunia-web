<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'description' => 'required|min:5',
            'seat' => 'required|numeric',
            'door' => 'required|numeric',
            'bagagge' => 'required|numeric',
            'ac' => 'required',
            'gear_shift' => 'required',
            'karaoke' => 'required',
            'tv' => 'required',
            'smoking_area' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama bus harus diisi',
            'name.min' => 'Nama bus minimal 5 huruf',
            'images.required' => 'Gambar harus ada',
            'images.image' => 'Ekstensi gambar harus jpg, jpeg, gif, dan png',
            'images.mimes' => 'Ekstensi gambar harus jpg, jpeg, gif, dan png',
            'images.max' => 'Ukuran gambar tidak boleh lebih dari 5 mb',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi minimal 5 huruf',
            'seat.required' => 'Jumlah seat harus diisi',
            'seat.numeric' => 'Jumlah seat harus berupa angka',
            'door.required' => 'Jumlah pintu harus diisi',
            'door.numeric' => 'Jumlah pintu harus berupa angka',
            'bagagge.required' => 'Jumlah bagasi harus diisi',
            'bagagge.numeric' => 'Jumlah bagasi harus berupa angka',
            'ac.required' => 'Pilih salah satu pilihan',
            'gear_shift.required' => 'Pilih salah satu pilihan',
            'karaoke.required' => 'Pilih salah satu pilihan',
            'tv.required' => 'Pilih salah satu pilihan',
            'smoking_area.required' => 'Pilih salah satu pilihan',
        ];
    }
}
