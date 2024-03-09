<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signUp(AuthRequest $request){
        // Создаем пользователя
        $user = User::create($request->all());
        // Генерируем токен пользователя
        $token = $user->generateToken();
        // Проверка наличия файла
        if($request->hasFile('avatar')){
            $originalName = $request->avatar->getClientOriginalName();
            $originalExtension = $request->avatar->getClientOriginalExtension();
            //Генерация уникалного имени файла
            $fileName = $this->generateUniqueFileName($originalName, $originalExtension);
            $request->avatar->storeAs('uploads', $fileName);
            $user->avatar = $fileName;
            $user->save();
        }

        return response()->json(['token' => $token ])->setStatusCode(200);
    }

    public function generateUniqueFileName($origName, $origExt){
        $fileName = Str::slug(pathinfo($origName, PATHINFO_FILENAME));
        $i = 1;

        // Проверка наличия файла с таким же именем
        while (Storage::exists("uploads/{$fileName}.{$origExt}")) {
            $fileName = Str::slug(pathinfo($origName, PATHINFO_FILENAME)) . "({$i})";
            $i++;
        }
        return $fileName . '.' . $origExt;
    }
}
