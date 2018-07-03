<?php

namespace Test;

require_once '../vendor/autoload.php';

use DAO\Database\Connection;

try {
    $connection = Connection::getInstance();
    //var_dump($connection->getAttribute(PDO::ATTR_SERVER_VERSION));

    $userDao = new UserDAO();

    /**
     * create
     */
    //$newUser = new User();
    //$newUser->setUsername("test22");
    //$newUser->setPassword("pass2");
    //$newUser->setEmail("test2@email.com");
    //$userDao->create($newUser);


    /**
     * get
     */

    //$user = $userDao->get(2);
    //if ($user instanceof User){
    //    echo $user->getUsername();
    //}
    //echo "------\n";

    /**
     * delete
     */
    //$userDao->delete(1);


    $criteriaUser = new CriteriaUser('test','','');

    /**
     * getAll
     */
    //var_export($userDao->getAll($criteriaUser));

    /**
     * category
     */
    //var_export($userDao->category($criteriaUser));

    /**
     * getValue
     */
    echo $userDao->getValue($criteriaUser);
} catch (\Exception $e) {
    echo $e->getMessage();
}
