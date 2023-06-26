<?php

namespace Core\Modules;

/**
 * @author Freddyede<patouillardfranck3@gmail.com>
 * @class @AuthenticatorModules
 * @desc This class contains all authenticator roads
 */
class AuthenticatorRoadsModules
{
    /**
     * @var array $roads
     * @desc This property contains all roads for all users
     * [
     *      "system" => [
     *      ],
     *      users table has array 'is_admin' which values can be set to true or false
     *      connectToDB = new PDO();
     *
     *      if is_admin === true
     *
     *      else is_admin === false
     *      "routes" => [
     *          "authenticated" => [
     *              "GET" => [], "POST" => [], "PUT" => [], "PATCH" => []
     *          ],
     *          "notAuthenticated" => [
     *              "GET" => [], "POST" => [], "PUT" => [], "PATCH" => []
     *          ]
     *      ]
     * ]
     */
    private static array $roads = [];
}