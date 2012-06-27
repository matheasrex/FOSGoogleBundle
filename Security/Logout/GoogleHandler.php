<?php

/*
 * This file is part of the FOSGoogleBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\GoogleBundle\Security\Logout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

/**
 * Listener for the logout action
 *
 * This handler will clear the application's Google cookie.
 */
class GoogleHandler implements LogoutHandlerInterface
{
    private $googleApi;

    public function __construct(\apiClient $googleApi)
    {
        $this->googleApi = $googleApi;
    }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        $response->headers->clearCookie('gsr_'.$this->googleApi->getAppId());
    }
}
