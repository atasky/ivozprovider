<?php

namespace Ivoz\Provider\Domain\Model\Brand;

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
    public static function getPropertyMap(string $context = self::CONTEXT_SIMPLE)
    {
        if ($context === self::CONTEXT_SIMPLE) {
            return [
                'id',
                'name',
                'recordingsLimitMB',
                'recordingsLimitEmail',
                'logo',
                'invoice',
                'domain',
                'services',
                'urls',
                'relFeatures'
            ];
        }

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


