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
     * @var \Ivoz\Provider\Domain\Model\Country\CountryDto | null
     */
    private $country;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
    public static function getPropertyMap()
    {
        return [
            'tz',
            'comment',
            'id',
            'label',
            'country'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @return static
     */
    public function setTz($tz = null)
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
     * @return static
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
     * @return static
     */
    public function setId($id = null)
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
     * @return static
     */
    public function setLabelEn($labelEn = null)
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
     * @return static
     */
    public function setLabelEs($labelEs = null)
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
     * @param \Ivoz\Provider\Domain\Model\Country\CountryDto $country
     *
     * @return static
     */
    public function setCountry(\Ivoz\Provider\Domain\Model\Country\CountryDto $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\CountryDto
     */
    public function getCountry()
    {
        return $this->country;
    }
}


