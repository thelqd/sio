<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectFreelancer
 *
 * @property int $project_id
 * @property int $freelancer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Freelancer $freelancer
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer whereFreelancerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectFreelancer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectFreelancer extends Model
{
    protected $table = 'project_freelancer';

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
