<?php

namespace Ivoz\Provider\Domain\Model\Language;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;


class LanguageDto extends LanguageDtoAbstract
{
    /**
     * @inheritdoc
     */
    public function denormalize(array $data, string $context = '')
    {
        $this->setIden($data['iden']);
        $this->setNameEn(
            $data['name']['en']
        );
        $this->setNameEs(
            $data['name']['es']
        );
    }
}


