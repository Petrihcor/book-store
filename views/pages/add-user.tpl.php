<?php
/**
 * @var array $errors
 */

require_once __DIR__ . "/../header.tpl.php";

?>
<div class="container mt-5">
    <form method="post" action="/users/add">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name">
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
            <input type="text" class="form-control" id="age" name="age">
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
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>