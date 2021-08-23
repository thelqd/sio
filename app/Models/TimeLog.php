<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TimeLog
 *
 * @property int $id
 * @property string $start_time
 * @property string $end_time
 * @property int $freelancer_id
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Freelancer $freelancer
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereFreelancerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TimeLog extends Model
{
    protected $table = 'time_log';

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
