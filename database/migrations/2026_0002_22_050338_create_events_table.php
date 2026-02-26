<?php

use App\Models\Category;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("events", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table
                ->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->date("start_date");
            $table->date("end_date");
            $table->enum("event_type", ["online", "physical"]);
            $table->string("address")->nullable();
            $table->foreignIdFor(Media::class);
            $table->boolean("admin_approved")->default(false);
            $table->boolean("suspended")->default(false);
            $table->string("venue")->nullable();
            $table->boolean("published");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("events");
    }
};
