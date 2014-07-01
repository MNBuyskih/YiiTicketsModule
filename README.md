YiiTicketsModule
================
Примерный конфиг в protected/config/main.php

<code><pre>
'modules'    => array(
        // ...
        'tickets' => [
            'class'           => 'ext.tickets.TicketsModule',
            'layout'          => 'application.views.layouts.column1',
            'categories'      => ['Общие вопросы', 'Еще какие-то вопросы'],
            'states'          => ['Ожидает ответа', 'Закрыт'],
            'defaultState'    => 0,
            'getUserId'       => function () {
                    return 1; // Измените на реальный фунционал
                },
            'getAnswerUserId' => function (Tickets $ticket) {
                    // Определяем, что авторизованный пользователь - автор тикета.
                    $userId = Yii::app()->user->id;
                    if ($ticket->user_id == $userId) {
                        return $userId;
                    }
                    // Определяем, что у авторизованного пользователя есть доступ для ответов в чужие тикеты
                    $superUsers = [2, 3, 4, 5, 6];
                    if (in_array($userId, $superUsers)) {
                        return $userId;
                    }
                    return $ticket->user_id; // false;
                },
            'getUserName'     => function ($id) {
                    $users = [0 => 'User', 1 => 'Admin'];

                    return isset($users[$id]) ? $users[$id] : $id;
                },
            'isSuperUser'     => function () {
                    return true; // Измените на реальный фунционал
                }
        ],
        // ...
    ),
<pre></code>


Полное описание методов можно найти в TicketsModule.php
