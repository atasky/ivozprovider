<?php

namespace Ivoz\Api\Swagger\Serializer;

use ApiPlatform\Core\Metadata\Property\Factory\PropertyNameCollectionFactoryInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Ivoz\Core\Application\Helper\ArrayObjectHelper;

class DocumentationNormalizerDecorator implements NormalizerInterface
{
    protected $decoratedNormalizer;

    public function __construct(
        NormalizerInterface $decoratedNormalizer,
        PropertyNameCollectionFactoryInterface $propertyNameCollectionFactory
    ) {

        $reflection = new \ReflectionClass($decoratedNormalizer);
        $property = $reflection->getProperty('propertyNameCollectionFactory');
        $property->setAccessible(true);
        $property->setValue($decoratedNormalizer, $propertyNameCollectionFactory);
        $property->setAccessible(false);

        $this->decoratedNormalizer = $decoratedNormalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $this->decoratedNormalizer->supportsNormalization(...func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $response = $this->decoratedNormalizer->normalize(...func_get_args());
        $response['definitions']  = $this->fixRelationReferences($response['definitions'] );

//        echo "paths<br />";
//        dump(ArrayObjectHelper::parseResurively($response['paths']));
//        echo "definitions<br />";
//        dump(ArrayObjectHelper::parseResurively($response['definitions']));
//        die;

        return $response;
    }

    private function isEntity($resourceName)
    {
        if (strpos($resourceName, '_')) {
            return false;
        }

        return true;
    }

    private function fixRelationReferences($definitions)
    {
        foreach ($definitions as $key => $value) {

            if (!$this->isEntity($key)) {
                continue;
            }

            if (!array_key_exists('properties', $definitions[$key])) {
                continue;
            }

            $context = explode('-', $key);
            foreach ($definitions[$key]['properties'] as $propertyKey => $property) {
                $definitions[$key]['properties'][$propertyKey] = $this->fixRelationProperty($property, $context[1] ?? '');
            }
        }

        return $definitions;
    }

    private function fixRelationProperty($property, $context = null)
    {
        $isCollection = array_key_exists('items', $property);
        $isReference = array_key_exists('$ref', $property);

        if (!($isCollection || $isReference)) {
            return $property;
        }

        if ($isReference) {

            if ($this->isEntity($property['$ref'])) {
                $property = $this->setContext($property, 'Simple', $context);
            }

            return $property;
        }

        if (!array_key_exists('$ref', $property['items'])) {
            return $property;
        }

        if ($this->isEntity($property['items']['$ref'])) {
            $property['items'] = $this->setContext($property['items'], 'Simple', $context);
        }

        return $property;
    }

    private function setContext($property, $suffix, $context)
    {
        if ($context !== 'Detailed') {
            unset($property['$ref']);
            $property['type'] = 'string';
            return $property;
        }

        $refSegments = explode('-', $property['$ref']);
        $property['$ref'] = $refSegments[0] . '-' . $suffix;

        return $property;
    }
}