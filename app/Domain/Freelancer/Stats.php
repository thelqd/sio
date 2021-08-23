<?php
declare(strict_types=1);

namespace App\Domain\Freelancer;


use App\Repositories\ProjectFreelancerRepository;
use App\Repositories\TimeLogRepository;
use Illuminate\Database\Eloquent\Collection;


class Stats
{
    /** @var TimeLogRepository  */
    private TimeLogRepository $timeLogRepository;

    /** @var ProjectFreelancerRepository  */
    private ProjectFreelancerRepository $projectFreelancerRepository;

    /** @var int  */
    private int $freelancerId;

    private array $result;

    public function __construct(
        TimeLogRepository $timeLogRepository,
        ProjectFreelancerRepository $projectFreelancerRepository
    )
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->projectFreelancerRepository = $projectFreelancerRepository;
        $this->result = [];
    }

    /**
     * @return int
     */
    public function getFreelancerId(): int
    {
        return $this->freelancerId;
    }

    /**
     * @param int $freelancerId
     */
    private function setFreelancerId(int $freelancerId): void
    {
        $this->freelancerId = $freelancerId;
    }

    /**
     * @param int $freelancerId
     * @return array
     * @throws \Exception
     */
    public function process(int $freelancerId): array
    {
        $this->setFreelancerId($freelancerId);
        return $this->calculate();
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function calculate(): array
    {

        $projects = $this->getProjects();
        foreach ($projects as $project) {
            $workingHours = $this->calculateHoursByProject($project['id']);
            $this->result[$project['id']] = [
                'name' => $project['name'],
                'countHours' => 0,
                'timeLogs' => $workingHours
            ];
            $hourCont = 0;
            foreach ($workingHours as $workingHour) {
                $hourCont += $workingHour['hours'];
            }
            $this->result[$project['id']]['countHours'] = $hourCont;
        }
        return $this->result;
    }

    /**
     * @return mixed[]
     */
    private function getProjects(): array
    {
        $projectList = [];
        $projects = $this->projectFreelancerRepository->getProjectsByFreelancer($this->getFreelancerId());
        foreach ($projects as $project) {
            $projectList[] = [
                'id' => $project->project->id,
                'name' => $project->project->name
            ];
        }
        return $projectList;
    }

    /**
     * @param int $projectId
     * @return array
     * @throws \Exception
     */
    private function calculateHoursByProject(int $projectId): array
    {
        $result = [];
        $timeLogs = $this->timeLogRepository->getByFreelancerAndProject(
            $this->getFreelancerId(),
            $projectId
        );

        foreach ($timeLogs as $timeLog) {
            $result[] = [
                'startTime' => $timeLog->start_time,
                'endTime' => $timeLog->end_time,
                'hours' => $this->diffDates($timeLog->start_time, $timeLog->end_time)
            ];
        }
        return $result;
    }

    /**
     * @param string $startTime
     * @param string $endTime
     * @return int
     * @throws \Exception
     */
    private function diffDates(string $startTime, string $endTime): int
    {
        $startDate = new \DateTime($startTime);
        $endDate = new \DateTime($endTime);

        $diffDate = $endDate->diff($startDate);
        return $diffDate->h;
    }

}
