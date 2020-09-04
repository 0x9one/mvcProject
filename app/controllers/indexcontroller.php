<?php

namespace PHPMVC\Controllers;
use PHPMVC\Models\ClientsModel;
use PHPMVC\Models\SuppliersModel;
use PHPMVC\Models\UsersModel;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('index.default');
        $this->_data['users'] = UsersModel::count();
        $this->_data['clients'] = ClientsModel::count();
        $this->_data['suppliers'] = SuppliersModel::count();
        $this->_view();
    }

}