<?php

namespace Ivoz\Provider\Domain\Model\Brand;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;


class BrandDto extends BrandDtoAbstract
{
    private $logoPath;

    public function getFileObjects()
    {
        return [
            'logo'
        ];
    }

    /**
     * @return self
     */
    public function setLogoPath(string $path = null)
    {
        $this->logoPath = $path;

        return $this;
    }
    /**
     * @return string
     */
    public function getLogoPath()
    {
        return $this->logoPath;
    }


    /**
     * @return array
     */
    public function normalize(string $context)
    {
        $values = $this->__toArray();
        $allowedValues = [
            'name',
            'id',
        ];
        switch ($context) {
            case 'item':
                array_push($allowedValues, ...[
                    'logo',
                    'invoice',
                    'domain',
                    'language',
                    'defaultTimezone'
                ]);
            case 'list':
                array_push($allowedValues, ...[
                    'domainUsers',
                    'fromName',
                    'fromAddress',
                    'recordingsLimitMB',
                    'recordingsLimitEmail'
                ]);
        }
        $filtered = array_filter(
            $values,
            function ($key) use ($allowedValues) {
                return in_array($key, $allowedValues);
            },
            ARRAY_FILTER_USE_KEY
        );

        return $filtered;
    }
}


