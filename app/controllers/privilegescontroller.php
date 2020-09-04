<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('privileges.default');

        $this->_data['privileges'] = PrivilegesModel::getAll();

        $this->_view();
    }

    public function createAction() {
        $this->language->load('template.common');
        $this->language->load('privileges.labels');
        $this->language->load('privileges.create');

        if(isset($_POST['submit'])) {
            $privilege = new PrivilegesModel();
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);
            if($privilege->save())
            {
                $this->redirect('/privileges');
            }
        }
        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegesModel::getByPK($id);

        if($privilege === false) {
            $this->redirect('/privileges');
        }

        $this->_data['privilege'] = $privilege;

        $this->language->load('template.common');
        $this->language->load('privileges.labels');
        $this->language->load('privileges.create');

        if(isset($_POST['submit'])) {
            $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterString($_POST['Privilege']);
            if($privilege->save())
            {
                $this->redirect('/privileges');
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $privilege = PrivilegesModel::getByPK($id);

        if($privilege === false) {
            $this->redirect('/privileges');
        }

        $groupPrivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
        if(false !== $groupPrivileges) {
            foreach ($groupPrivileges as $groupPrivilege) {
                $groupPrivilege->delete();
            }
        }

        if($privilege->delete())
        {
            $this->redirect('/privileges');
        }
    }

}