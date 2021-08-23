<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use App\Repositories\ProjectRepository;
use App\Repositories\TimeLogRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** @var ProjectRepository  */
    private ProjectRepository $projectRepository;

    private TimeLogRepository $timeLogRepository;

    /** @var Request  */
    private Request $request;

    public function __construct(
        ProjectRepository $projectRepository,
        TimeLogRepository $timeLogRepository,
        Request $request
    )
    {
        $this->projectRepository = $projectRepository;
        $this->timeLogRepository = $timeLogRepository;
        $this->request = $request;
    }

    public function index()
    {
        return view('choseproject', [
            'projects' => $this->projectRepository->all(),
            'url' => 'project.show'
        ]);
    }

    public function show(int $projectId)
    {
        $project = $this->projectRepository->getById($projectId);
        $timeLog = $this->timeLogRepository->getByProject($projectId);

        return view('projectview', [
            'project' => $project,
            'timeLogs' => $timeLog
        ]);
    }

    public function create()
    {
        return view('projectcreate');
    }

    public function add()
    {
        $name = $this->request->get('projectName', null);
        if(!$name) {
            return view('genericerror', [
                'errorMessage' => 'Kein Name angegeben'
            ]);
        }
        $result = $this->projectRepository->add($name);
        if($result) {
            return view('projectsuccess');
        } else {
            return view('genericerror', [
                'errorMessage' => 'Fehler beim speichern'
            ]);
        }
    }
}
