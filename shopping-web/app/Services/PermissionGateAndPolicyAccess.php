<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{

    public function setGateAndPolicyAccess(){
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateUser();
        $this->defineGateRole();
    }
    public function defineGateCategory(){
        Gate::define('list-category', function ($user) {
            return $user->checkPermissionAccess('category_list');
        });
        Gate::define('add-category', function ($user) {
            return $user->checkPermissionAccess('category_add');
        });
        Gate::define('edit-category', function ($user) {
            return $user->checkPermissionAccess('category_edit');
        });
        Gate::define('remove-category', function ($user) {
            return $user->checkPermissionAccess('category_remove');
        });
    }
    public function defineGateMenu(){
        Gate::define('list-menu', function ($user) {
            return $user->checkPermissionAccess('menu_list');
        });
        Gate::define('add-menu', function ($user) {
            return $user->checkPermissionAccess('menu_add');
        });
        Gate::define('edit-menu', function ($user) {
            return $user->checkPermissionAccess('menu_edit');
        });
        Gate::define('remove-menu', function ($user) {
            return $user->checkPermissionAccess('menu_remove');
        });
    }
    public function defineGateProduct(){
        Gate::define('list-product', function ($user) {
            return $user->checkPermissionAccess('product_list');
        });
        Gate::define('add-product', function ($user) {
            return $user->checkPermissionAccess('product_add');
        });
        Gate::define('edit-product', function ($user) {
            return $user->checkPermissionAccess('product_edit');
        });
        Gate::define('remove-product', function ($user) {
            return $user->checkPermissionAccess('product_remove');
        });
    }
    public function defineGateSlider(){
        Gate::define('list-slider', function ($user) {
            return $user->checkPermissionAccess('slider_list');
        });
        Gate::define('add-slider', function ($user) {
            return $user->checkPermissionAccess('slider_add');
        });
        Gate::define('edit-slider', function ($user) {
            return $user->checkPermissionAccess('slider_edit');
        });
        Gate::define('remove-slider', function ($user) {
            return $user->checkPermissionAccess('slider_remove');
        });
    }
    public function defineGateSetting(){
        Gate::define('list-setting', function ($user) {
            return $user->checkPermissionAccess('setting_list');
        });
        Gate::define('add-setting', function ($user) {
            return $user->checkPermissionAccess('setting_add');
        });
        Gate::define('edit-setting', function ($user) {
            return $user->checkPermissionAccess('setting_edit');
        });
        Gate::define('remove-setting', function ($user) {
            return $user->checkPermissionAccess('setting_remove');
        });
    }
    public function defineGateUser(){
       
        Gate::define('list-user', function ($user) {
            return $user->checkPermissionAccess('user_list');
        });
        Gate::define('add-user', function ($user) {
            return $user->checkPermissionAccess('user_add');
        });
        Gate::define('edit-user', function ($user) {
            return $user->checkPermissionAccess('user_edit');
        });
        Gate::define('remove-user', function ($user) {
            return $user->checkPermissionAccess('user_remove');
        });
    }
    public function defineGateRole(){
        Gate::define('list-role', function ($user) {
            return $user->checkPermissionAccess('role_list');
        });
        Gate::define('add-role', function ($user) {
            return $user->checkPermissionAccess('role_add');
        });
        Gate::define('edit-role', function ($user) {
            return $user->checkPermissionAccess('role_edit');
        });
        Gate::define('remove-role', function ($user) {
            return $user->checkPermissionAccess('role_remove');
        });
    }
}