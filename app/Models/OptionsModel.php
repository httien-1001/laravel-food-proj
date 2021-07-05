<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsModel extends Model
{
    use HasFactory;

    protected $table = 'options_models';
    protected $fillable = [
        'title',
        'logo',
        'About',
        'facebook',
        'instagram',
        'youtube',
        'twitter'
    ];

    public static function UpdateX($data, $id)
    {
        $data->validate([
            'img' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
        $filename = OptionsModel::find($id)->logo;
        if ($data->hasFile('img')) {
            $file = $data->file('img');
            $filename = '/images/' . $data->file('img')->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }
        $data->merge(['logo' => $filename]);
        if (OptionsModel::where('id', $id)->update($data->only('title', 'About', 'logo', 'facebook', 'youtube',
            'twitter', 'instagram'))) {
            return true;
        }

    }
}
