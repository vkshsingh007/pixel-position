<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $gurded = [];
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag); // ✅ Corrected
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
