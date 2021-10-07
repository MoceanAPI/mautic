<?php
namespace MauticPlugin\MoceanApiBroadcastBundle\Entity;

use Mautic\CoreBundle\Entity\CommonRepository;

class HistoryRepository extends CommonRepository
{
    public function getSmsLogs()
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $query->select('sms_log1', 'sms_log2');

        $results = $query->getQuery()->getResult();

        return $results;
    }
}