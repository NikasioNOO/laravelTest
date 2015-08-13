<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 20/07/2015
 * Time: 08:46 PM
 */

namespace LaravelDemo;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use LaravelDemo\Repositories\UserRepository;
use Request;


class AuthenticateUser {
    private $socialite;
    private $auth;
    private $users;

    public function __construct(Socialite $socialite, Guard $auth, UserRepository $users) {
        $this->socialite = $socialite;
        $this->users = $users;
        $this->auth = $auth;
    }

    public function execute($request, $listener, $provider) {
        if (!$request) return $this->getAuthorizationFirst($provider);


        $user = $this->users->findByUserNameOrCreate($this->getSocialUser($provider), $provider);

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);
    }

    /**
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst($provider) {
        return $this->socialite->driver($provider)->redirect();
    }

    private function getSocialUser($provider) {
        return $this->socialite->driver($provider)->user();
    }
}