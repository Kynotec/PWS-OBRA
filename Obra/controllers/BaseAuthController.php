<?php

require_once '.\controlers\BaseController.php';
require_once '.\models\Auth.php';

class BaseAuthController extends Controller
{
    protected function loginFilterByRole($roles = [])
    {
        $auth = new Auth();
        $role = $auth->getRole();
        $validRole = in_array($role, $roles);

        if (!$validRole) {
            header('Location: ./router.php?' . INVALID_ACCESS_ROUTE);
        }
    }

}