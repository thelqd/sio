<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Domain\TimeLog as TimeLogDomain;
use App\Models\TimeLog;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class TimeLogRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return TimeLog::all();
    }

    /**
     * @param int $id
     * @return TimeLogDomain
     * @throws Exception
     */
    public function getById(int $id): TimeLogDomain
    {
        $timeLog = TimeLog::where('id', $id)->get()->first();
        $timeLogDomain = new TimeLogDomain();
        $timeLogDomain->setProjectId($timeLog->project_id);
        $timeLogDomain->setFreelancerId($timeLog->freelancer_id);
        $timeLogDomain->setStartTime(new \DateTime($timeLog->start_time));
        $timeLogDomain->setEndTime(new \DateTime($timeLog->end_time));
        return $timeLogDomain;
    }

    /**
     * @param int $projectId
     * @return Collection
     */
    public function getByProject(int $projectId): Collection
    {
        return TimeLog::where('project_id', $projectId)->get();
    }

    /**
     * @param int $freelancerId
     * @return Collection
     */
    public function getByFreelancerAndProject(int $freelancerId, int $projectId): Collection
    {
        return TimeLog::where('freelancer_id', $freelancerId)
            ->where('project_id', $projectId)
            ->orderBy('start_time')
            ->get();
    }

    /**
     * @param TimeLogDomain $log
     * @return bool
     */
    public function addLog(TimeLogDomain $log): bool
    {
        return $this->save($log);
    }

    /**
     * @param TimeLogDomain $log
     * @param int $timeLogId
     * @return bool
     */
    public function update(TimeLogDomain $log, int $timeLogId): bool
    {
        return $this->save($log, $timeLogId);
    }

    /**
     * @param TimeLogDomain $log
     * @param int|null $timeLogId
     * @return bool
     */
    private function save(TimeLogDomain $log, int $timeLogId = null): bool
    {
        if(isset($timeLogId)) {
            $timeLog = TimeLog::find($timeLogId);
        } else {
            $timeLog = new TimeLog();
        }
        $timeLog->start_time = $log->getStartTime();
        $timeLog->end_time = $log->getEndTime();
        $timeLog->freelancer_id = $log->getFreelancerId();
        $timeLog->project_id = $log->getProjectId();

        $timeLog->save();
        return true;
    }

    /**
     * @param int $logId
     * @return bool
     */
    public function delete(int $logId): bool
    {
        try {
            $log = TimeLog::findOrFail($logId);
            $log->delete();
            return true;
        } catch (Exception $exception) {
            return false;
        }

    }
}
