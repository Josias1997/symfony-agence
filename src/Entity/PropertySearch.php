<?php
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch 
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @Assert\Range(min=10, max=400)
     * @var int|null
     */

    private $minSurface;

    /**
     * @var ArrayCollection
     */

    private $options;

    /**
     * @param ArrayCollection
     */

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }
    
    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice()
    {
      return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice)
    {
      $this->maxPrice = $maxPrice;

      return $this;
    }

    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface()
    {
      return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
      $this->minSurface = $minSurface;

      return $this;
    }

    /**
     * Get the value of options
     * @return ArrayCollection
     */ 
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * Set the value of options
     * @param ArrayCollection
     * @return  self
     */ 
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }
}
 ?>
