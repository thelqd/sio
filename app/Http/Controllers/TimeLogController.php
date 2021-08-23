<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use App\Domain\TimeLog;
use App\Repositories\FreelancerRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TimeLogRepository;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
    /** @var TimeLogRepository  */
    private TimeLogRepository $timeLogRepository;

    /** @var ProjectRepository  */
    private ProjectRepository $projectRepository;

    /** @var FreelancerRepository  */
    private FreelancerRepository $freelancerRepository;

    private Request $request;

    public function __construct(
        TimeLogRepository $timeLogRepository,
        ProjectRepository $projectRepository,
        FreelancerRepository $freelancerRepository,
        Request $request
    )
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->projectRepository = $projectRepository;
        $this->freelancerRepository = $freelancerRepository;
        $this->request = $request;
    }

    public function index()
    {
        return view('choseproject', [
            'projects' => $this->projectRepository->all(),
            'url' => 'timelog.create'
        ]);
    }

    public function create(int $projectId)
    {
        $freelancers = $this->freelancerRepository->getByProject($projectId);
        return view('timelog', [
            'projectId' => $projectId,
            'freelancers' => $freelancers,
            'date' => date('d.m.Y')
        ]);
    }

    public function add()
    {
        $this->saveTimeLog();
        return view('timelogsuccess', [
            'message' => 'eingetragen'
        ]);
    }

    public function update()
    {
        $timeLogId = (int)$this->request->get('timeLogId', null);
        $this->saveTimeLog($timeLogId);
        return view('timelogsuccess', [
            'message' => 'bearbeitet'
        ]);
    }

    public function delete(int $projectId, int $timeLogId)
    {
        $status = $this->timeLogRepository->delete($timeLogId);
        if($status) {
            return view('timelogdelete', [
                'projectId' => $projectId
            ]);
        } else {
            return view('genericerror', [
                'errorMessage' => 'Löschen fehlgeschlagen'
            ]);
        }
    }

    public function edit(int $projectId, int $timeLogId) {
        $freelancers = $this->freelancerRepository->getByProject($projectId);
        $timeLog = $this->timeLogRepository->getById($timeLogId);

        return view('timelogedit', [
            'projectId' => $projectId,
            'freelancers' => $freelancers,
            'freelancerId' => $timeLog->getFreelancerId(),
            'date' => $timeLog->getStartTime()->format('d.m.Y'),
            'startTime' => $timeLog->getStartTime()->format('H'),
            'endTime' => $timeLog->getEndTime()->format('H'),
            'timeLogId' => $timeLogId
        ]);
    }

    private function saveTimeLog(int $timeLogId = null): void
    {
        // TODO: Add validations and logic checks for input
        $inputData = $this->request->all();

        $startTime = TimeLog::ConvertDateTimeHelper(
            $inputData['date'],
            (int)$inputData['startTime']
        );
        $endTime = TimeLog::ConvertDateTimeHelper(
            $inputData['date'],
            (int)$inputData['endTime']
        );

        $timeLog = new TimeLog();
        $timeLog->setProjectId((int)$inputData['projectId']);
        $timeLog->setFreelancerId((int)$inputData['freelancer']);
        $timeLog->setStartTime($startTime);
        $timeLog->setEndTime($endTime);

        if(isset($timeLogId)) {
            $this->timeLogRepository->update($timeLog, $timeLogId);
        } else {
            $this->timeLogRepository->addLog($timeLog);

        }
    }
}
