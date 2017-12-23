<?php

namespace Ivoz\Api\JsonLd\Serializer\Normalizer;

use ApiPlatform\Core\Exception\InvalidArgumentException;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\Service\Assembler\DtoAssembler;
use Ivoz\Core\Application\Service\CreateEntityFromDTO;
use Ivoz\Core\Application\Service\UpdateEntityFromDTO;
use Ivoz\Core\Domain\Model\EntityInterface;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Based on ApiPlatform\Core\JsonLd\Serializer\ItemNormalizer
 */
class EntityDenormalizer implements DenormalizerInterface
{
    const FORMAT = 'jsonld';

    /**
     * @var CreateEntityFromDTO
     */
    private $createEntityFromDTO;

    /**
     * @var UpdateEntityFromDTO
     */
    private $updateEntityFromDTO;

    /**
     * @var DtoAssembler
     */
    private $dtoAssembler;

    /**
     * DataGateway constructor.
     * @param CreateEntityFromDTO $createEntityFromDTO
     * @param UpdateEntityFromDTO $updateEntityFromDTO
     */
    public function __construct(
        CreateEntityFromDTO $createEntityFromDTO,
        UpdateEntityFromDTO $updateEntityFromDTO,
        DtoAssembler $dtoAssembler
    ) {
        $this->createEntityFromDTO = $createEntityFromDTO;
        $this->updateEntityFromDTO = $updateEntityFromDTO;
        $this->dtoAssembler = $dtoAssembler;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return self::FORMAT === $format && class_exists($type . 'Dto');
    }

    /**
     * {@inheritdoc}
     *
     * @throws InvalidArgumentException
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $context['operation_type'] = DataTransferObjectInterface::CONTEXT_SIMPLE;
        $entity = array_key_exists('object_to_populate', $context)
            ? $context['object_to_populate']
            : null;

        return $this->denormalizeEntity(
            $data,
            $class,
            $entity
        );
    }

    /**
     * @todo PUT :: update
     */
    private function denormalizeEntity(array $data, string $class, EntityInterface $entity = null)
    {
        $dtoClass = $class. 'Dto';
        $dto = $entity
            ? $this->dtoAssembler->toDTO($entity)
            : new $dtoClass;

        $baseData = $dto->normalize('');
        $data = array_replace_recursive($baseData, $data);
        $dto->denormalize($data);

        if ($entity) {
            $this->updateEntityFromDTO->execute(
                $entity,
                $dto
            );

            return $entity;
        }

        return $this->createEntityFromDTO->execute($class, $dto);
    }
}