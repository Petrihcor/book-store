<?php
/**
 * @var \Src\Book $book
 * @var array $errors
 */

require_once __DIR__ . "/../header.tpl.php";



?>
<div class="container mt-5">
    <form method="post" action="/book/edit?id=<?=$book->getId() ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $book->getTitle() ?>">
            <?php
            if (array_key_exists('title', $errors)) {
                foreach ($errors['title'] as $error) {
                    ?>
                    <div class="invalid-feedback d-block">
                        <?= $error ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="<?= $book->getAuthor() ?>">
            <?php
            if (array_key_exists('author', $errors)) {
                foreach ($errors['author'] as $error) {
                    ?>
                    <div class="invalid-feedback d-block">
                        <?= $error ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Год</label>
            <input type="text" class="form-control" id="year" name="year" value="<?= $book->getYear() ?>">
            <?php
            if (array_key_exists('year', $errors)) {
                foreach ($errors['year'] as $error) {
                    ?>
                    <div class="invalid-feedback d-block">
                        <?= $error ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>