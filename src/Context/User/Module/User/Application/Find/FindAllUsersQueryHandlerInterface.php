<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 11/11/18
 * Time: 19:38
 */

namespace App\Context\User\Module\User\Application\Find;


interface FindAllUsersQueryHandlerInterface
{
    public function __invoke(FindAllUsersQuery $findAllUsersQuery);
}