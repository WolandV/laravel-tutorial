<?php

use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pays', function($table)
        {
            $table->increments('id');

            // столбец с внешним ключем,
            // связан со стобцом "id" таблицы "clients"
            // при обновлении или удалении пользователя
            // его платежи также удаляются
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // 6 цирф до запятой, две - после запятой
            $table->float('amount', 6, 2)->unsigned();

            // автоматически создает поля "created_at" и "updated_at"
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('pays');
	}

}