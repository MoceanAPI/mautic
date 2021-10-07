<?php
namespace MauticPlugin\MoceanApiBroadcastBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\CategoryBundle\Entity\Category;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;

/**
 * @ORM\Table(name="plugin_mocean_history")
 * @ORM\Entity
 */
class History
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="sender", type="string", length=255)
     */
    private $sender;

    /**
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;
    
    /**
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @ORM\Column(name="recipient", type="string", length=15)
     */
    private $recipient;

    /**
     * @ORM\Column(name="response", type="string", length=255)
     */
    private $response;
    
    /**
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
    
    /**
     * @ORM\Column(name="sms_log1", type="string", length=255)
     */
    private $smsLog1;
    
    /**
     * @ORM\Column(name="sms_log2", type="string", length=255)
     */
    private $smsLog2;

    public function __construct()
    {
        $this->sender = '';
        $this->datetime = new \Datetime();
        $this->message = '';
        $this->recipient = '';
        $this->response = '';
        $this->status = '';
        $this->smsLog1 = '';
        $this->smsLog2 = '';
    }

    /**
     * @param ORM\ClassMetadata $metadata
     */
    public static function loadMetadata (ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('plugin_mocean_history')
            ->setCustomRepositoryClass('MauticPlugin\MoceanApiBroadcastBundle\Entity\HistoryRepository');
            
        $builder->addId();
        $builder->addNamedField('sender', 'string', 'sender');
        $builder->addNamedField('datetime', 'datetime', 'datetime');
        $builder->addNamedField('message', 'string', 'message');
        $builder->addNamedField('recipient', 'string', 'recipient');
        $builder->addNamedField('response', 'string', 'response');
        $builder->addNamedField('status', 'string', 'status');
        $builder->addNamedField('smsLog1', 'string', 'sms_log1');
        $builder->addNamedField('smsLog2', 'string', 'sms_log2');
        //Each varchar field is 191 max char
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param $sender
     *
     * @return $this
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @return $this
     */
    public function setDatetime(\DateTime $datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param $recipient
     *
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $response
     *
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getSmsLog1()
    {
        return $this->smsLog1;
    }

    /**
     * @param $smsLog1
     *
     * @return $this
     */
    public function setSmsLog1($smsLog1)
    {
        $this->smsLog1 = $smsLog1;

        return $this;
    }

    /**
     * @return string
     */
    public function getSmsLog2()
    {
        return $this->smsLog2;
    }

    /**
     * @param $smsLog2
     *
     * @return $this
     */
    public function setSmsLog2($smsLog2)
    {
        $this->smsLog2 = $smsLog2;

        return $this;
    }
}