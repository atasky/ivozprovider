<?php

namespace Ivoz\Core\Application;

interface DataTransferObjectInterface
{
    const CONTEXT_SIMPLE = 'Simple';
    const CONTEXT_DETAILED = 'Detailed';

    /**
     * @return array
     */
    public function normalize(string $context);

    /**
     * @return void
     */
    public function denormalize(array $data, string $context);

    /**
     * @return array
     */
    public static function getPropertyMap(string $context = '');

    /**
     * @param ForeignKeyTransformerInterface $transformer
     * @return null
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer);

    /**
     * @param CollectionTransformerInterface $transformer
     * @return null
     */
    public function transformCollections(CollectionTransformerInterface $transformer);
}
