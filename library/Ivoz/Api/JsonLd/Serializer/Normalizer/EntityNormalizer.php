<?php

namespace Ivoz\Api\JsonLd\Serializer\Normalizer;

use ApiPlatform\Core\Api\IriConverterInterface;
use ApiPlatform\Core\Api\OperationType;
use ApiPlatform\Core\Api\ResourceClassResolverInterface;
use ApiPlatform\Core\Exception\InvalidArgumentException;
use ApiPlatform\Core\JsonLd\ContextBuilderInterface;
use ApiPlatform\Core\JsonLd\Serializer\JsonLdContextTrait;
use ApiPlatform\Core\Metadata\Resource\Factory\ResourceMetadataFactoryInterface;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\EntityInterface;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Based on ApiPlatform\Core\JsonLd\Serializer\ItemNormalizer
 */
class EntityNormalizer implements NormalizerInterface, DenormalizerInterface
{
    use JsonLdContextTrait;

    const FORMAT = 'jsonld';

    /**
     * @var IriConverterInterface
     */
    protected $iriConverter;
    /**
     * @var ResourceClassResolverInterface
     */
    protected $resourceClassResolver;

    /**
     * @var ResourceMetadataFactoryInterface
     */
    private $resourceMetadataFactory;
    /**
     * @var ContextBuilderInterface
     */
    private $contextBuilder;

    public function __construct(
        ResourceMetadataFactoryInterface $resourceMetadataFactory,
        IriConverterInterface $iriConverter,
        ResourceClassResolverInterface $resourceClassResolver,
        ContextBuilderInterface $contextBuilder
    ) {
        $this->iriConverter = $iriConverter;
        $this->resourceClassResolver = $resourceClassResolver;
        $this->resourceMetadataFactory = $resourceMetadataFactory;
        $this->contextBuilder = $contextBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return self::FORMAT === $format && ($data instanceof EntityInterface);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if (!$object instanceof EntityInterface) {
            Throw new \Exception('Object must implement EntityInterface');
        }

        $this->iriConverter->getIriFromItem($object);
        return $this->normalizeDto($object->toDto(), $format, $context);
    }

    private function normalizeDto(DataTransferObjectInterface $dto, string $format, array $context, $isSubresource = false)
    {
        $resourceClass = substr(
            get_class($dto),
            0,
            strlen('Dto') * -1
        );
        $resourceMetadata = $this->resourceMetadataFactory->create($resourceClass);
        $data = $this->addJsonLdContext($this->contextBuilder, $resourceClass, $context);

        // Use resolved resource class instead of given resource class to support multiple inheritance child types
        $context['resource_class'] = $resourceClass;
        $context['iri'] = $this
            ->iriConverter
            ->getItemIriFromResourceClass(
                $resourceClass,
                ['id' => $dto->getId()]
            );

        $rawData = $dto->normalize($context['operation_type']);

        foreach ($rawData as $key => $value) {

            if ($value instanceof DataTransferObjectInterface) {
                if ($isSubresource) {
                    unset($rawData[$key]);
                    continue;
                }

                $embeddedContext = [
                    'item_operation_name' => 'get',
                    'operation_type' => 'item',
                    'request_uri' => $context['request_uri']
                ];

                try {
                    $rawData[$key] = $this->normalizeDto(
                        $value,
                        'list',
                        $embeddedContext,
                        true
                    );

                } catch (\Exception $e) {
                    unset($rawData[$key]);
                }
            }
        }

        $data['@id'] = $context['iri'];
        $data['@type'] = $resourceMetadata->getIri() ?: $resourceMetadata->getShortName();

        return $data + $rawData;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return self::FORMAT === $format && class_exists($type . 'DTO');
    }

    /**
     * {@inheritdoc}
     *
     * @throws InvalidArgumentException
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        // Avoid issues with proxies if we populated the object
        if (isset($data['@id']) && !isset($context[self::OBJECT_TO_POPULATE])) {
            if (isset($context['api_allow_update']) && true !== $context['api_allow_update']) {
                throw new InvalidArgumentException('Update is not allowed for this operation.');
            }

            $context[self::OBJECT_TO_POPULATE] = $this->iriConverter->getItemFromIri($data['@id'], $context + ['fetch_data' => true]);
        }

        return $this->denormalizeEntity($data, $class, $format, $context);
    }

    private function denormalizeEntity($data, $class, $format, $context)
    {
        throw new \Exception('To be implemented ');
    }
}