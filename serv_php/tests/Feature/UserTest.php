<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user()
    {
        // Создаем пользователя
        $user = new User();
        $user->userMail = 'test@example.com';
        $user->userPassword = Hash::make('password');
        $user->userRedate = now();
        $user->userLastlogin = 0;
        $user->userAccess = 'admin';
        $user->userFirma = 'Test Firma';
        $user->userVorname = 'John';
        $user->userName = 'Doe';
        $user->userStrasse = 'Test Strasse';
        $user->userHNr = '123';
        $user->userPLZ = '12345';
        $user->userOrt = 'Test Ort';
        $user->userTelefon = '1234567890';
        $user->userLexofficeId = '123456';
        $user->userStatus = 1;
        $user->userRechnungEmpfaenger = 'John Doe';
        $user->save();

        // Проверяем, что пользователь создан
        $this->assertDatabaseHas('users', [
            'userMail' => 'test@example.com',
            'userAccess' => 'admin',
            'userFirma' => 'Test Firma',
            'userVorname' => 'John',
            'userName' => 'Doe',
            'userStrasse' => 'Test Strasse',
            'userHNr' => '123',
            'userPLZ' => '12345',
            'userOrt' => 'Test Ort',
            'userTelefon' => '1234567890',
            'userLexofficeId' => '123456',
            'userStatus' => 1,
            'userRechnungEmpfaenger' => 'John Doe',
        ]);

        // Проверяем, что пароль корректен
        $createdUser = User::where('userMail', 'test@example.com')->first();
        $this->assertTrue(Hash::check('password', $createdUser->userPassword));
    }
}
