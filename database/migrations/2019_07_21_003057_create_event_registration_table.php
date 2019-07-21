8
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
 
<?php
 
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
 
class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile_no');
            $table->text('desc');
            $table->tinyInteger('status')->default(0);
            $table->integer('fee');
            $table->string('order_id');
            $table->string('transaction_id')->default(0);
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
        Schema::drop("events");
    }
}