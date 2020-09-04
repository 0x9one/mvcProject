<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\UsersProfilesModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;
    private $_createActionRoles =
        [
            'FirstName'     => 'req|alpha|between(3,10)',
            'LastName'      => 'req|alpha|between(3,10)',
            'Username'      => 'req|alphanum|between(3,12)',
            'Password'      => 'req|min(6)|eq_field(CPassword)',
            'CPassword'     => 'req|min(6)',
            'Email'         => 'req|email|eq_field(CEmail)',
            'CEmail'        => 'req|email',
            'PhoneNumber'   => 'alphanum|max(15)',
            'GroupId'       => 'req|int'
        ];

    private $_editActionRoles =
        [
            'PhoneNumber'   => 'alphanum|max(15)',
            'GroupId'       => 'req|int'
        ];
    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.default');

        $this->_data['users'] = UsersModel::getUsers($this->session->u);

        $this->_view();
    }

    public function createAction()
    {

        $this->language->load('template.common');
        $this->language->load('users.create');
        $this->language->load('users.labels');
        $this->language->load('users.messages');
        $this->language->load('validation.errors');

        $this->_data['groups'] = UsersGroupsModel::getAll();
        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $user = new UsersModel();
            $user->Username = $this->filterString($_POST['Username']);
            $user->cryptPassword($_POST['Password']);
            $user->Email = $this->filterString($_POST['Email']);
            $user->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId = $this->filterInt($_POST['GroupId']);
            // TODO:: You Need To Solve Problem DateTime
            $user->SubscriptionDate = date();
            $user->LastLogin = date("Y-m-d H:i:s");
            $user->Status = 1;
            // TODO:: Fix User Exists Error
//            if(UsersModel::userExists($user->Username)) {
//                $this->messenger->add($this->language->get('message_user_exists'), Messenger::APP_MESSAGE_ERROR);
//                $this->redirect('/users');
//            }

            if($user->save()) {
                $userProfile = new UsersProfilesModel();
                $userProfile->UserId = $user->UserId;
                $userProfile->FirstName = $this->filterString($_POST['FirstName']);
                $userProfile->LastName = $this->filterString($_POST['LastName']);
                $userProfile->save(false);
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }

        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $user = UsersModel::getByPK($id);

        if($user === false || $this->session->u->UserId == $id) {
            $this->redirect('/users');
        }

        $this->_data['user'] = $user;

        $this->language->load('template.common');
        $this->language->load('users.edit');
        $this->language->load('users.labels');
        $this->language->load('users.messages');
        $this->language->load('validation.errors');

        $this->_data['groups'] = UsersGroupsModel::getAll();


        if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST)) {

            $user->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId = $this->filterInt($_POST['GroupId']);
            $user->SubscriptionDate = date();

            if($user->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $user = UsersModel::getByPK($id);
        $userprofile = UsersProfilesModel::getByPK($id);


        if($user === false && $userprofile  === false || $this->session->u->UserId == $id ) {
            $this->redirect('/users');
        }

        $this->language->load('users.messages');

        if($user->delete()) {
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }

        $this->redirect('/users');
    }

    public function checkUserExistsAjaxAction()
    {
        if(isset($_POST['Username']) && !empty($_POST['Username'])) {
            header('Content-type: text/plain');
            if(UsersModel::userExists($this->filterString($_POST['Username'])) !== false) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }

}