<?php
/**
 * @var array $userList
 * @var \Src\User $user
 */

require_once __DIR__ . "/../header.tpl.php";

?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Пользователи</h6>
            <form class="d-flex" action="/search/users" method="get" role="search">
                <input class="form-control me-2" name="query" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
            <?php foreach ($userList as $user) {?>
            <div class="d-flex text-body-secondary pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark"><?= $user->getName()?></strong>
                        <div>
                            <a href="/user/edit?id=<?=$user->getId() ?>">Редактировать</a>
                            <a href="/user/delete?id=<?=$user->getId() ?>">Удалить</a>
                        </div>
                    </div>
                    <span class="d-block">Возраст: <?= $user->getAge()?></span>
                    <?php foreach ($user->getListbooks() as $book) {?>
                        <span class="d-block"><?= $book ?></span>
                    <?php }?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>