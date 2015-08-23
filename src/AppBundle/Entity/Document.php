<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Entity()
 */
class Document {

    /**
     * @var File
     */
    public $file;
}
