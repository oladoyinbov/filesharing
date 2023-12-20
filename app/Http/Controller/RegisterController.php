<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Users;
use Fastvolt\Helper\{Session, UUID, Hash};

class RegisterController extends \Fastvolt\Core\Controller
{

    /**
     * Sign Up Home Function
     *
     * @return 
     */
    public function index()
    {
        if (request()->is_post_request()) {

            # validate form fields
            if ($this->validate_form()->has_errors()) {
                return '<div class="alert alert-danger mb-4 fw-bold fs-5"><i class="fas fa-exclamation-circle"></i> '.$this->validate_form()->errors().'</div>';
            }

            # retrieve form fields
            $form = request()->input();
            $password = request()->post('password', escape_output: false);

            # prepare data
            $insertData = (new Users)->insert([
                'id' => null,
                'uuid' => UUID::generate(),
                'first_name' => $form->first_name,
                'last_name' => $form->last_name,
                'email' => $form->email,
                'password' => Hash::password($password),
                'created_at' => get_timestamp()
            ]);

            # insert data to db
            if ($insertData) {
                
                # display message and redirect to login
                response()->redirect(route('login'), timer: 3000);

                return '<div class="alert alert-success mb-4 fw-bold fs-5">
                            <i class="fad fa-thumbs-up"></i> Registration Successful, You will be Redirected Soon..
                        </div>';
            }

            return '<div class="alert alert-success mb-4 fw-bold fs-5">
                        <i class="fas fa-exclamation-circle"></i> Something Went Wrong!
                    </div>';
        }

        return $this->render('register');
    }



    public function validate_mail()
    {
        if (request()->hasPostItems('email')) {

            $validate = request()->validate([
                'email' => 'required|is_email|unique:Users',
            ], [
                'email' => 'Email input is invalid',
                'email.unique' => 'Email already exist, please try another one',
            ]);

            if ($validate->has_errors()) {
                return $validate->errors();
            }
        }
    }


    private function validate_form()
    {
        return request()->validate([
            'first_name' => 'required|is_string|min:5|max:30',
            'last_name' => 'required|is_string|min:5|max:30',
            'email' => 'required|is_email|unique:Users',
            'password' => 'required'
        ], [
            'first_name' => 'First name field input is required',
            'first_name.min' => 'First name must be greater then 5 characters',
            'first_name.max' => 'First name must be lesser then 30 characters',
            'first_name.is_string' => 'First name input is invalid',
            'last_name' => 'Last name input is required or invalid',
            'last_name.min' => 'Last name must be greater then 5 characters',
            'last_name.max' => 'Last name must be lesser then 30 characters',
            'last_name.is_string' => 'Last name input is invalid',
            'email' => 'Email input is invalid',
            'email.unique' => 'Email already exist, please try another one',
            'password' => 'Password field is required'
        ]);
    }

}