<?php

namespace Src;
class Book
{

    public function __construct(
        private int $id,
        private string $title,
        private string $author,
        private int $year,
        public string|null $user
    )
    {
    }

    /**
     * @return int
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function __toString(): string
    {
        return "{$this->title}, {$this->year} года выпуска, написанная автором {$this->author}";
    }

}