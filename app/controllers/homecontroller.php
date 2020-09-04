<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;


class HomeController extends AbstractController

{
    use Helper;
    public function defaultAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }

    public function blogAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }

    public function blogdetailsAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }

    public function cartAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function checkoutAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function confirmationAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function contactAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function elementsAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function productdetailsAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }
    public function shopAction()
    {
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);

        $this->_home();
    }

}