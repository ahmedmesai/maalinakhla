<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['club_key', 'leader_key', 'co_leader_key', 'name', 'level'];

    /**
     * Get the club that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_key', 'id');
    }

    /**
     * Get the leader that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_key');
    }

    /**
     * Get the co_leader that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function co_leader()
    {
        return $this->belongsTo(User::class, 'co_leader_key');
    }
}
