<?php

namespace Ivoz\Provider\Domain\Model\Timezone;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class TimezoneDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $tz;

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $labelEn = '';

    /**
     * @var string
     */
    private $labelEs = '';

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $country;

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
            'tz' => $this->getTz(),
            'comment' => $this->getComment(),
            'id' => $this->getId(),
            'label' => [
                'en' => $this->getLabelEn(),
                'es' => $this->getLabelEs()
            ],
            'country' => $this->getCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->country = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $tz
     *
     * @return TimezoneDtoAbstract
     */
    public function setTz($tz)
    {
        $this->tz = $tz;

        return $this;
    }

    /**
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @param string $comment
     *
     * @return TimezoneDtoAbstract
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param integer $id
     *
     * @return TimezoneDtoAbstract
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
     * @param string $labelEn
     *
     * @return TimezoneDtoAbstract
     */
    public function setLabelEn($labelEn)
    {
        $this->labelEn = $labelEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelEn()
    {
        return $this->labelEn;
    }

    /**
     * @param string $labelEs
     *
     * @return TimezoneDtoAbstract
     */
    public function setLabelEs($labelEs)
    {
        $this->labelEs = $labelEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelEs()
    {
        return $this->labelEs;
    }

    /**
     * @param integer $countryId
     *
     * @return TimezoneDtoAbstract
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $country
     *
     * @return TimezoneDtoAbstract
     */
    public function setCountry(\Ivoz\Provider\Domain\Model\Country\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}


