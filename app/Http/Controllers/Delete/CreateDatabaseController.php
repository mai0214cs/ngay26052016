<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

class CreateDatabaseController extends Controller {

    function index() {
        $this->TableUserAdmin();
        $this->TableProductCate();
        $this->TableProductList();
        $this->TableProductImage();
    }

    private function TableProductList() {
        if (!Schema::hasTable('productlist')) {
            Schema::create('productlist', function($table) {
                $table->increments('id');
                $table->string('name');
                $table->string('alias');
                $table->integer('price');
                $table->string('intro');
                $table->text('content');
                $table->string('image');
                $table->string('keyword');
                $table->string('description');
                $table->integer('productcate_id');
                $table->integer('useradmin_id');
            });
        }
    }
    private function TableProductCate() {
        if (!Schema::hasTable('productcate')) {
            Schema::create('productcate', function($table) {
                $table->increments('id');
                $table->string('name');
                $table->string('alias');
                $table->integer('order');
                $table->integer('parent_id');
                $table->string('keyword');
                $table->string('description');
            });
        }
    }
    private function TableProductImage() {
        if (!Schema::hasTable('productimage')) {
            Schema::create('productimage', function($table) {
                $table->increments('id');
                $table->integer('productlist_id');
                $table->string('image');
            });
        }
    }
    private function TableUserAdmin() {
        if (!Schema::hasTable('useradmin')) {
            Schema::create('useradmin', function($table) {
                $table->increments('id');
                $table->string('name');
                $table->string('username');
                $table->string('password');
                $table->integer('level');
                $table->string('remember_token');
            });
        }
    }

    /*
      $table->bigIncrements('id');	Incrementing ID (primary key) using a "UNSIGNED BIG INTEGER" equivalent.
      $table->bigInteger('votes');	BIGINT equivalent for the database.
      $table->binary('data');	BLOB equivalent for the database.
      $table->boolean('confirmed');	BOOLEAN equivalent for the database.
      $table->char('name', 4);	CHAR equivalent with a length.
      $table->date('created_at');	DATE equivalent for the database.
      $table->dateTime('created_at');	DATETIME equivalent for the database.
      $table->decimal('amount', 5, 2);	DECIMAL equivalent with a precision and scale.
      $table->double('column', 15, 8);	DOUBLE equivalent with precision, 15 digits in total and 8 after the decimal point.
      $table->enum('choices', ['foo', 'bar']);	ENUM equivalent for the database.
      $table->float('amount');	FLOAT equivalent for the database.
      $table->increments('id');	Incrementing ID (primary key) using a "UNSIGNED INTEGER" equivalent.
      $table->integer('votes');	INTEGER equivalent for the database.
      $table->ipAddress('visitor');	IP address equivalent for the database.
      $table->json('options');	JSON equivalent for the database.
      $table->jsonb('options');	JSONB equivalent for the database.
      $table->longText('description');	LONGTEXT equivalent for the database.
      $table->macAddress('device');	MAC address equivalent for the database.
      $table->mediumInteger('numbers');	MEDIUMINT equivalent for the database.
      $table->mediumText('description');	MEDIUMTEXT equivalent for the database.
      $table->morphs('taggable');	Adds INTEGER taggable_id and STRING taggable_type.
      $table->nullableTimestamps();	Same as timestamps(), except allows NULLs.
      $table->rememberToken();	Adds remember_token as VARCHAR(100) NULL.
      $table->smallInteger('votes');	SMALLINT equivalent for the database.
      $table->softDeletes();	Adds deleted_at column for soft deletes.
      $table->string('email');	VARCHAR equivalent column.
      $table->string('name', 100);	VARCHAR equivalent with a length.
      $table->text('description');	TEXT equivalent for the database.
      $table->time('sunrise');	TIME equivalent for the database.
      $table->tinyInteger('numbers');	TINYINT equivalent for the database.
      $table->timestamp('added_on');	TIMESTAMP equivalent for the database.
      $table->timestamps();	Adds created_at and updated_at columns.
      $table->uuid('id');	UUID equivalent for the database.
     *   
      ->first()	Place the column "first" in the table (MySQL Only)
      ->after('column')	Place the column "after" another column (MySQL Only)
      ->nullable()	Allow NULL values to be inserted into the column
      ->default($value)	Specify a "default" value for the column
      ->unsigned()	Set integer columns to UNSIGNED
      ->comment('my comment')	Add a comment to a column
     * 
     * 
     * 
      $table->primary('id');	Add a primary key.
      $table->primary(['first', 'last']);	Add composite keys.
      $table->unique('email');	Add a unique index.
      $table->unique('state', 'my_index_name');	Add a custom index name.
      $table->index('state');	Add a basic index.
     *    */
}
