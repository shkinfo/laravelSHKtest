<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id('userId');
                $table->string('userMail', 255)->unique();
                $table->string('userPassword', 255);
                $table->dateTime('userRedate');
                $table->integer('userLastlogin');
                $table->string('userAccess', 255);
                $table->string('userFirma', 255);
                $table->string('userVorname', 255);
                $table->string('userName', 255);
                $table->string('userStrasse', 255);
                $table->string('userHNr', 255);
                $table->string('userPLZ', 255);
                $table->string('userOrt', 255);
                $table->string('userTelefon', 255);
                $table->string('userLexofficeId', 255);
                $table->integer('userStatus');
                $table->string('userRechnungEmpfaenger', 255);
                $table->timestamps();
            });
        } else {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'userMail')) {
                    $table->string('userMail', 255)->unique()->nullable();
                }
                if (!Schema::hasColumn('users', 'userPassword')) {
                    $table->string('userPassword', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userRedate')) {
                    $table->dateTime('userRedate')->nullable();
                }
                if (!Schema::hasColumn('users', 'userLastlogin')) {
                    $table->integer('userLastlogin')->nullable();
                }
                if (!Schema::hasColumn('users', 'userAccess')) {
                    $table->string('userAccess', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userFirma')) {
                    $table->string('userFirma', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userVorname')) {
                    $table->string('userVorname', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userName')) {
                    $table->string('userName', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userStrasse')) {
                    $table->string('userStrasse', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userHNr')) {
                    $table->string('userHNr', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userPLZ')) {
                    $table->string('userPLZ', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userOrt')) {
                    $table->string('userOrt', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userTelefon')) {
                    $table->string('userTelefon', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userLexofficeId')) {
                    $table->string('userLexofficeId', 255)->nullable();
                }
                if (!Schema::hasColumn('users', 'userStatus')) {
                    $table->integer('userStatus')->nullable();
                }
                if (!Schema::hasColumn('users', 'userRechnungEmpfaenger')) {
                    $table->string('userRechnungEmpfaenger', 255)->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
