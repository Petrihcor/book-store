<?php

namespace Src;

class User
{

    public function __construct(
        private int $id,
        private string $name,
        private int $age,
        private array|null $listbooks
    )
    {
    }

    /**
     * @return array|null
     */
    public function getListbooks(): ?array
    {
        return $this->listbooks;
    }

    /**
     * @param array|null $listbooks
     */
    public function setListbooks(?array $listbooks): void
    {
        $this->listbooks = $listbooks;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param array $listOfBooks
     */



    public function getName(): string
    {
        return $this->name;
    }


    public function getAge(): int
    {
        return $this->age;
    }



}