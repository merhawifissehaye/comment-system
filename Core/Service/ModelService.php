<?php

// BlogService.php

namespace Core\Service;

use Core\MyORM\AbstractMapper;

class ModelService extends AbstractService
{

    /**
     * BlogService constructor.
     * @param AbstractMapper $modelMapper
     */
    public function __construct(AbstractMapper $modelMapper)
    {
        parent::__construct($modelMapper);
    }
}