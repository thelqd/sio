<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Collection;

class FreelancerRepository
{
    /** @var ProjectFreelancerRepository */
    private ProjectFreelancerRepository $projectFreelancer;

    public function __construct(ProjectFreelancerRepository $projectFreelancer)
    {
        $this->projectFreelancer = $projectFreelancer;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Freelancer::all();
    }

    /**
     * @param int $id
     * @return Freelancer
     */
    public function getById(int $id): Freelancer
    {
        return Freelancer::where('id', $id)->get()->first();
    }

    /**
     * @param int $projectId
     * @return Collection
     */
    public function getByProject(int $projectId): Collection
    {
        $idList = $this->projectFreelancer->getFreelancerByProject($projectId);
        return Freelancer::find($idList);
    }
}
