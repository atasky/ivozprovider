<?php

namespace Ivoz\Provider\Domain\Model\Recording;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class RecordingDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $callid;

    /**
     * @var \DateTime
     */
    private $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $type = 'ddi';

    /**
     * @var float
     */
    private $duration = '0.000';

    /**
     * @var string
     */
    private $caller;

    /**
     * @var string
     */
    private $callee;

    /**
     * @var string
     */
    private $recorder;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $recordedFileFileSize;

    /**
     * @var string
     */
    private $recordedFileMimeType;

    /**
     * @var string
     */
    private $recordedFileBaseName;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->__toArray();
    }

    /**
     * @return void
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'callid' => $this->getCallid(),
            'calldate' => $this->getCalldate(),
            'type' => $this->getType(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'recorder' => $this->getRecorder(),
            'id' => $this->getId(),
            'recordedFile' => [
                'fileSize' => $this->getRecordedFileFileSize(),
                'mimeType' => $this->getRecordedFileMimeType(),
                'baseName' => $this->getRecordedFileBaseName()
            ],
            'company' => $this->getCompany()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $callid
     *
     * @return RecordingDtoAbstract
     */
    public function setCallid($callid = null)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param \DateTime $calldate
     *
     * @return RecordingDtoAbstract
     */
    public function setCalldate($calldate)
    {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * @param string $type
     *
     * @return RecordingDtoAbstract
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param float $duration
     *
     * @return RecordingDtoAbstract
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $caller
     *
     * @return RecordingDtoAbstract
     */
    public function setCaller($caller = null)
    {
        $this->caller = $caller;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * @param string $callee
     *
     * @return RecordingDtoAbstract
     */
    public function setCallee($callee = null)
    {
        $this->callee = $callee;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * @param string $recorder
     *
     * @return RecordingDtoAbstract
     */
    public function setRecorder($recorder = null)
    {
        $this->recorder = $recorder;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * @param integer $id
     *
     * @return RecordingDtoAbstract
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $recordedFileFileSize
     *
     * @return RecordingDtoAbstract
     */
    public function setRecordedFileFileSize($recordedFileFileSize)
    {
        $this->recordedFileFileSize = $recordedFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRecordedFileFileSize()
    {
        return $this->recordedFileFileSize;
    }

    /**
     * @param string $recordedFileMimeType
     *
     * @return RecordingDtoAbstract
     */
    public function setRecordedFileMimeType($recordedFileMimeType)
    {
        $this->recordedFileMimeType = $recordedFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedFileMimeType()
    {
        return $this->recordedFileMimeType;
    }

    /**
     * @param string $recordedFileBaseName
     *
     * @return RecordingDtoAbstract
     */
    public function setRecordedFileBaseName($recordedFileBaseName)
    {
        $this->recordedFileBaseName = $recordedFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedFileBaseName()
    {
        return $this->recordedFileBaseName;
    }

    /**
     * @param integer $companyId
     *
     * @return RecordingDtoAbstract
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Company\Company $company
     *
     * @return RecordingDtoAbstract
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}


