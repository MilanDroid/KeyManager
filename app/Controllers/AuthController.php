<?php
namespace App\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {
    public function getLogin() {
        return $this->renderHTML('login.twig', [
            'page_tittle' => 'Sign in'
        ]);
    }

    public function postLogin($request) {
        $postData = $request->getParsedBody();
        $responseMessage = null;

        $helper = new Helper();

        // Here's the backend validation, because the fronted validation can be edited
        if($helper->inputValidation('email', $postData['email']) && $helper->inputValidation('password', $postData['password'])) {
            $user = User::where('email', $postData['email'])->first();
            // Checking if the user is allowed to be loged
            if($user && !$user->status) {
                return $this->renderHTML('disabledUser.twig', [
                    'page_tittle' => 'Disabled',
                    'tittle' => 'User Disabled'
                ]);
            }

            // Checking the password
            if(password_verify($postData['password'], $user->password)) {
                $_SESSION['userId'] = [
                    'id' => $user->id,
                    'auth' => true,
                    'userData' => array(
                        'userName' => $user->username,
                        'email' => $user->email,
                        'names' => $user->names,
                        'lastNames' => $user->last_names,
                        'status' => $user->status
                    )
                ];

                return new RedirectResponse('/');
            } else {
                $responseMessage = 'Bad credentials';
            }
        } else {
            $responseMessage = 'None valids inputs';
        }

        return $this->renderHTML('login.twig', [
            'page_tittle' => 'Sign in',
            'responseMessage' => $responseMessage
        ]);
    }

    public function getLogout() {
        // Droping the session user data
        unset($_SESSION['userId']);
        return new RedirectResponse('/login');
    }
}