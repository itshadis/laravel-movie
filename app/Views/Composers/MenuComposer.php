<?php

namespace App\Views\Composers;

class MenuComposer 
{
  public function compose($view) {
    $menu = [
      "Home" => "/",
      "About" => "/about",
      "Contact" => "/contact"
    ];

    $authenticated = false;

    if($authenticated) {
      $menu = array_merge($menu, [
        "Logout" => "/logout",
        "Profile" => "/profile",
        "Dashoard" => "/dashboard",
      ]);
    }

    $view->with("menu", $menu);
  }
}