<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use App\Domain\Freelancer\Stats;
use App\Repositories\FreelancerRepository;

class FreelancerController extends Controller
{
    /** @var FreelancerRepository  */
    private FreelancerRepository $freelancerRepository;

    private Stats $stats;

    public function __construct(
        FreelancerRepository $freelancerRepository,
        Stats $stats
    )
    {
        $this->freelancerRepository = $freelancerRepository;
        $this->stats = $stats;
    }

    public function index()
    {
        return view('freelancerlist', [
            'freelancers' => $this->freelancerRepository->all()
        ]);
    }

    public function show($freelancerId)
    {
        $stats = $this->stats->process((int)$freelancerId);
        $freelancer = $this->freelancerRepository->getById((int)$freelancerId);
        return view('freelancer',[
            'freelancer' => $freelancer,
            'stats' => $stats
        ]);
    }
}
