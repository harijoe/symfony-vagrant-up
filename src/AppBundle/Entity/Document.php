<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Document
 *
 * @ORM\Table(name="documents")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DocumentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var File
     *
     * @ORM\OneToMany(targetEntity="File", mappedBy="document", cascade={"persist", "remove"})
     *
     */
    private $files;

    /**
     * @var ArrayCollection
     */
    private $uploadedFiles;

    public function __construct() {
        $this->files = new ArrayCollection();
        $this->uploadedFiles = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Document
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getFiles() {
        return $this->files;
    }
    public function setFiles(array $files) {
        $this->files = $files;
    }

    /**
     * @return ArrayCollection
     */
    public function getUploadedFiles()
    {
        return $this->uploadedFiles;
    }

    /**
     * @param ArrayCollection $uploadedFiles
     */
    public function setUploadedFiles($uploadedFiles)
    {
        $this->uploadedFiles = $uploadedFiles;
    }

    /**
     * @ORM\PreFlush()
     */
    public function upload()
    {
        foreach($this->uploadedFiles as $uploadedFile)
        {
            $file = new File($uploadedFile);

            $this->getFiles()->add($file);
            $file->setDocument($this);

            unset($uploadedFile);
        }
    }
}
