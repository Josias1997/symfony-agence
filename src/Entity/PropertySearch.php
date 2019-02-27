<?php
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

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
}
 ?>
