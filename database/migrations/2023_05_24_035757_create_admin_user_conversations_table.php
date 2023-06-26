<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 191)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('message')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->enum('type', ['Ticket', 'Dispute'])->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('order_number')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('admin_user_conversations');
    }
}
