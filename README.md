# image-upload
Laravel package for user activity logs in the system.

## Installation

Require this package with composer.

```shell
composer require mark-villudo/activity-logs
```

## Setup Migrations and Model

Make model with migration file at the same time.
Note: At the package the model used is under "App\Models\" then please do so.

```
php artisan make:model Models/ActivityLog -m
```

Activity Logs Table Structure

```
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('type', 32)->nullable();
            $table->text('action'); //required
            $table->text('description')->nullable();
            $table->string('ip_address', 64)->nullable();
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
        Schema::dropIfExists('activity_logs');
    }
}

```
Publish table or automatically create table in database

```
php artisan migrate
```

## Usage
```
  //Activity logs
  //Parameter details (type , action, description)
  storeActivity('Admin', 'Update Profile', 'Update Profile Settings');
  
  //End activity logs
```


