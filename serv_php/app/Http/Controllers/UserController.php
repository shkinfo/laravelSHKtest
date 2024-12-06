<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Валидация входных данных
        $validator = Validator::make($request->all(), [
            'userMail' => 'required|email|unique:users,userMail',
            'userPassword' => 'required|string|min:6',
            'userRedate' => 'required|date',
            'userLastlogin' => 'nullable|integer',
            'userAccess' => 'nullable|string|max:255',
            'userFirma' => 'nullable|string|max:255',
            'userVorname' => 'nullable|string|max:255',
            'userName' => 'nullable|string|max:255',
            'userStrasse' => 'nullable|string|max:255',
            'userHNr' => 'nullable|string|max:255',
            'userPLZ' => 'nullable|string|max:255',
            'userOrt' => 'nullable|string|max:255',
            'userTelefon' => 'nullable|string|max:255',
            'userLexofficeId' => 'nullable|string|max:255',
            'userStatus' => 'nullable|integer',
            'userRechnungEmpfaenger' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Создание пользователя
        $user = User::create([
            'userMail' => $request->userMail,
            'userPassword' => Hash::make($request->userPassword),
            'userRedate' => $request->userRedate,
            'userLastlogin' => $request->userLastlogin ?? 0,
            'userAccess' => $request->userAccess ?? 'user',
            'userFirma' => $request->userFirma,
            'userVorname' => $request->userVorname,
            'userName' => $request->userName,
            'userStrasse' => $request->userStrasse,
            'userHNr' => $request->userHNr,
            'userPLZ' => $request->userPLZ,
            'userOrt' => $request->userOrt,
            'userTelefon' => $request->userTelefon,
            'userLexofficeId' => $request->userLexofficeId,
            'userStatus' => $request->userStatus ?? 1,
            'userRechnungEmpfaenger' => $request->userRechnungEmpfaenger,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
}
