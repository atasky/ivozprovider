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
    public static function getPropertyMap($context = 'Simple')
    {
        return parent::getPropertyMap($context);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        if (!$context) {
            return parent::normalize($context);
        }

        $response =  $this->filterByContext(
            parent::normalize($context),
            $context
        );

        return $response;
    }

    protected static function filterByContext($values, string $context)
    {
        $allowedValues = [];

        switch ($context) {
            case 'Simple':
                array_push($allowedValues, ...[
                    'id',
                ]);
        }

        return array_filter(
            $values,
            function ($key) use ($allowedValues) {
                return in_array($key, $allowedValues);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

}


