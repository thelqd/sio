<?php
declare(strict_types=1);

namespace App\Domain;


use DateTime;

class TimeLog
{
    /** @var DateTime  */
    private DateTime $startTime;

    /** @var DateTime  */
    private DateTime $endTime;

    /** @var int */
    private int $projectId;

    /** @var int */
    private int $freelancerId;

    /**
     * @return DateTime
     */
    public function getStartTime(): DateTime
    {
        return $this->startTime;
    }

    /**
     * @param DateTime $startTime
     */
    public function setStartTime(DateTime $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return DateTime
     */
    public function getEndTime(): DateTime
    {
        return $this->endTime;
    }

    /**
     * @param DateTime $endTime
     */
    public function setEndTime(DateTime $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
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
    public function setFreelancerId(int $freelancerId): void
    {
        $this->freelancerId = $freelancerId;
    }

    /**
     * @param string $date
     * @param int $hour
     * @return DateTime
     */
    public static function ConvertDateTimeHelper(string $date, int $hour): DateTime
    {
        $dateCombined = $date . ' ' . $hour. ':00';
        return DateTime::createFromFormat('d.m.Y H:i', $dateCombined);
    }
}
