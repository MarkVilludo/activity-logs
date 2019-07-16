# Activity logs
Laravel package to log each user's activity in the system.

## Usage after Installed package.
```
storeActivity('user type' , 'User Action', 'Description');

```
## Installation

Require this package with composer.

```shell
composer require mark-villudo/activity-logs
```

## Setup Migrations and Model

Make model with migration file at the same time.
<br/> Note: At the package the model used is under "App\Models\" then please do so.

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
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('type', 32)->nullable();
            $table->text('action'); //required
            $table->text('description')->nullable();
            $table->string('ip_address', 64)->nullable();
            $table->text('device')->nullable();
            $table->text('platform')->nullable();
            $table->text('browser')->nullable();
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
Migrate table using composer and it's automatically create table in the database

```
php artisan migrate
```

## Usage
```
  //Parameter details (userType , action, description)
  storeActivity('Admin', 'Update Profile', 'Update Profile Settings');
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

