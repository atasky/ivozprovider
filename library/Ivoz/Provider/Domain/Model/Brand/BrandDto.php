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
    public static function getPropertyMap(string $context = 'Simple')
    {
        return parent::getPropertyMap($context);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return parent::normalize($context);
    }

}


