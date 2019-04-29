<?php
use App\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug',20);
            $table->string('description');
            $table->timestamps();
        });
        $default = Role::create(['slug'=>'guest','description' => 'Гость',]);
        Role::create(['slug'=>'superuser','description' => 'суперпользователь',]);
        Role::create(['slug'=>'editor','description' => 'редактор',]);
        Role::create(['slug'=>'translator','description' => 'переводчик',]);
        Role::create(['slug'=>'admin','description' => 'администратор',]);



        Schema::table('users', function (Blueprint $table) use ($default
        ) {
            $table->integer('role_id')->unsigned()->default($default->id);
            $table->foreign('role_id')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');

        });


    }
}
