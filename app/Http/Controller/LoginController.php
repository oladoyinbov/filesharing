<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Users;
use FastVolt\Helper\{Session, Hash};

class LoginController extends \FastVolt\Core\Controller
{

    /**
     * Hello World Function
     *
     * @return 
     */
    public function index()
    {
        if (request()->is_post_request()) {

            # form inputs
            $email = request()->input('email');
            $password = Hash::password(request()->post('password', escape_output: false));

            # check if user exist
            $checkUser = (new Users)
                ->where(['email' => $email, 'password' => $password])
                ->num_rows() > 0;

            if ($checkUser) {

                return 'User Exist!';

            } else {
                
                return 'User Does\'nt Exist';
            }

            // Session::store('fs_user', $form->email);
        }

        return $this->render('login');
    }


    private function validate_login()
    {
        return request()->validate([
            'email' => 'required|is_email',
            'password' => 'required'
        ], [
            'email' => 'Email input is invalid',
            'password' => 'Password field is required'
        ]);


    }


    private function limit_trial(): ?string
    {
        # set limits for login
        if (Session::get('trials') > 5 && !Session::has('login_trials_expiry')) {
            # set date to next 2 minutes
            Session::store('login_trials_expiry', strtotime('+2 minutes'));
            # return message
            return out('Please try again in next 2 minutes');
        }

        if (Session::has('login_trials_expiry') && Session::get('login_trials_expiry') < time()) {
            # unset session
            Session::get('trials');
            Session::unset('login_trials_expiry');
        }
    }

}