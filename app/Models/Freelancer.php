<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Freelancer
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Freelancer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Freelancer extends Model
{
    protected $table = 'freelancer';

    public function timeLog()
    {
        return $this->hasMany(TimeLog::class);
    }
}
