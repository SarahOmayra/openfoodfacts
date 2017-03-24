<?php


class classeCategorie
{
private $name;
private $nb_products;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNbProducts()
    {
        return $this->nb_products;
    }

    /**
     * @param mixed $nb_products
     */
    public function setNbProducts($nb_products)
    {
        $this->nb_products = $nb_products;
    }



}