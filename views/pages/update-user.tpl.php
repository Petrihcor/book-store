<?php
/**
 * @var Src\User $user
 * @var array $booksList
 * @var array $booksIds
 * @var Src\Book $book
 */


require_once __DIR__ . "/../header.tpl.php";

?>
<div class="container mt-5">
    <form method="post" action="/user/edit?id=<?=$user->getId() ?>">
        <input type="hidden" id="id" name="id" value="<?= $user->getId() ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user->getName() ?>">
            <?php
            if (array_key_exists('name', $errors)) {
                foreach ($errors['name'] as $error) {
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
            <label for="age" class="form-label">Возраст</label>
            <input type="text" class="form-control" id="age" name="age" value="<?= $user->getAge() ?>">
            <?php
            if (array_key_exists('age', $errors)) {
                foreach ($errors['age'] as $error) {
                    ?>
                    <div class="invalid-feedback d-block">
                        <?= $error ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <select name="listBooks[]" id="listBooks" multiple class="form-select" aria-label="Default select example">
            <?php foreach ($booksList as $book) {
                ?>
                <option value="<?= $book->getId()?>"
                    <?php
                        if (in_array($book->getTitle(), $booksIds)){
                        echo 'selected';
                        }
                        ?>
                ><?= $book->getTitle()?></option>
            <?php }?>
        </select>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>