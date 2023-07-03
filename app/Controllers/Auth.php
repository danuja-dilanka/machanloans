<?php

namespace App\Controllers;

use Config\Services;

class Auth extends BaseController {

    private $thisModel;

    public function __construct() {
        $this->thisModel = model('Auth_model');
    }

    public function dashboard() {
        if (!already_logined()) {
            return redirect()->route('login');
        }

        return view('dashboard');
    }

    public function index() {
        if (already_logined()) {
            return redirect()->route('dashboard');
        }

        return view('login', ['no_nav' => 1]);
    }

    public function login() {

        if (already_logined()) {
            return redirect()->route('dashboard');
        }

        $rules = [
            'email' => 'trim|required|valid_email',
            'password' => 'trim|required|min_length[7]'
        ];

        if ($this->request->is('post') && $this->validate($rules)) {
            $user = $this->thisModel->get_user($this->request->getPost("email"));
            if (isset($user->id) && password_verify($this->request->getPost("password"), $user->password)) {
                session()->set([
                    'ml_user_type' => encode($user->utype),
                    'ml_utype_name' => ($user->utype_name),
                    'ml_user_name' => ($user->name),
                    'ml_email' => $user->email,
                    'ml_user_rel_type' => $user->rel_type,
                    'ml_user_rel_id' => encode($user->rel_id),
                    'ml_user' => encode($user->id)
                ]);

                if ($user->utype == 2) {
                    $member = model('Member_model')->get_data($user->rel_id);
                    session()->set([
                        'profile_image' => $member->photo
                    ]);
                }

                /* SPPED UP SIDE MENU LOADING */

                $parents = $this->thisModel->get_parent_nav();
                $navabar = "";
                foreach ($parents as $pkey => $pvalue) {
                    $childs = $this->thisModel->get_child_nav($pvalue->id);
                    $tot_child = 0;
                    if (!has_permission($pvalue->module_name, $pvalue->action_name)) {
                        continue;
                    }

                    $navabar .= '<li><a href="' . ($pvalue->method != "" ? base_url($pvalue->class . "/" . $pvalue->method) : "javascript: void(0);") . '"><i class="fas fa-user-friends"></i><span>' . ($pvalue->name) . '</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>';
                    $one_time = true;

                    foreach ($childs as $ckey => $cvalue) {
                        if (!has_permission($cvalue->module_name, $cvalue->action_name)) {
                            continue;
                        }
                        if ($one_time == true) {
                            $navabar .= '<ul class="nav-second-level collapse" aria-expanded="false">';
                            $one_time = false;
                        }

                        $tot_child++;
                        $navabar .= '<li class="nav-item"><a class="nav-link" href="' . (base_url($pvalue->class . "/" . $cvalue->method)) . '">' . ($cvalue->name) . '</a></li>';
                    }

                    if ($tot_child > 0) {
                        $navabar .= '</ul>';
                    }

                    $navabar .= '</li>';
                }

                session()->set([
                    'ml_navabar' => $navabar,
                ]);

                /* END - SPPED UP SIDE MENU LOADING */
                if (is_admin()) {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->to(base_url('loan/loan_list'));
                }
            } else {
                Services::validation()->setError('wrong_cre', "Wrong Credentials");
                return redirect()->to(base_url('login'));
            }
        }

        return view('login', ['no_nav' => 1]);
    }

    public function logout() {
        $session = session();

        if (isset($session->ml_email)) {
            $session->remove('ml_email');
        }
        if (isset($session->ml_user_type)) {
            $session->remove('ml_user_type');
        }
        if (isset($session->ml_user)) {
            $session->remove('ml_user');
        }
        if (isset($session->ml_utype_name)) {
            $session->remove('ml_utype_name');
        }
        if (isset($session->ml_user_name)) {
            $session->remove('ml_user_name');
        }
        if (isset($session->ml_user_rel_id)) {
            $session->remove('ml_user_rel_id');
        }
        if (isset($session->ml_user_rel_type)) {
            $session->remove('ml_user_rel_type');
        }

        return redirect()->to(base_url('login'));
    }

}
