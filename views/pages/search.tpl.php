<?php
/**
 * @var array $query
 * @var \Src\Book $book
 */

require_once __DIR__ . "/../header.tpl.php";

?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h1 class="border-bottom pb-2 mb-0">Результаты поиска</h1>
            <?php
            if ($query[0] instanceof \Src\Book) {
            foreach ($query as $item) {
                ?>
                <div class="d-flex text-body-secondary pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark"><?= $item->getTitle()?></strong>
                            <div>
                                <a href="/book/edit?id=<?=$item->getId() ?>">Редактировать</a>
                                <a href="/book/delete?id=<?=$item->getId() ?>">Удалить</a>
                            </div>
                        </div>
                        <span class="d-block"><?= $item->getAuthor()?></span>

                    </div>
                </div>
            <?php }
            } elseif ($query[0] instanceof \Src\User) {
                foreach ($query as $item) {
                    ?>
                    <div class="d-flex text-body-secondary pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark"><?= $item->getName()?></strong>
                                <div>
                                    <a href="/user/edit?id=<?=$item->getId() ?>">Редактировать</a>
                                    <a href="/user/delete?id=<?=$item->getId() ?>">Удалить</a>
                                </div>
                            </div>
                            <span class="d-block">Возраст: <?= $item->getAge()?></span>

                        </div>
                    </div>
                <?php
                }
            }
           ?>

        </div>
    </div>
</div>