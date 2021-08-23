<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\ProjectFreelancer;
use Illuminate\Database\Eloquent\Collection;


class ProjectFreelancerRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return ProjectFreelancer::all();
    }

    /**
     * @param int $projectId
     * @return int[]
     */
    public function getFreelancerByProject(int $projectId): array
    {
        $freelancers = [];
        $projectFreelancer = ProjectFreelancer::where('project_id', $projectId)->get();
        foreach ($projectFreelancer as $freelancer) {
            $freelancers[] = $freelancer->freelancer_id;
        }
        return $freelancers;
    }

    /**
     * @param int $freelancerId
     * @return Collection
     */
    public function getProjectsByFreelancer(int $freelancerId): Collection
    {
        return ProjectFreelancer::where('freelancer_id', $freelancerId)->get();

    }

    /**
     * @param int $projectId
     * @param int $freelancerId
     */
    public function add(int $projectId, int $freelancerId): void
    {
        $projectFreelancer = new ProjectFreelancer();
        $projectFreelancer->project_id = $projectId;
        $projectFreelancer->freelancer_id = $freelancerId;
        $projectFreelancer->save();
    }
}
