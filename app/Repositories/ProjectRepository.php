<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Project::all();
    }

    /**
     * @param int $projectId
     * @return Project
     */
    public function getById(int $projectId): Project
    {
        return Project::where('id', $projectId)->get()->first();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function add(string $name): bool
    {
        try {
            $project = new Project();
            $project->name = $name;
            $project->save();
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
