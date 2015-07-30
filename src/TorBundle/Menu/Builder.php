<?php

namespace TorBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
public function mainMenu(FactoryInterface $factory, array $options)
{
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'nav navbar-nav');

$menu->addChild('Home', array('route' => 'tor_home'));
$menu->addChild('Calendar', array('route' => 'tor_calendar'));
$menu->addChild('Instruktorzy', array('route' => 'tor_instructors'));
$menu->addChild('Rekordy', array('route' => 'tor_records_user'));
$menu->addChild('Wyloguj', array('route' => 'fos_user_security_logout'));


return $menu;
}

public function adminMenu(FactoryInterface $factory, array $options)
{
    $menu = $factory->createItem('root');
    $menu->setChildrenAttribute('class', 'nav navbar-nav');

    $menu->addChild('Home', array('route' => 'tor_home'));
    $menu->addChild('Admin Panel', array('route' => 'tor_panel'));
    $menu->addChild('Calendar', array('route' => 'tor_calendar'));
    $menu->addChild('Instruktorzy', array('route' => 'tor_instructors'));
    $menu->addChild('Rekordy', array('route' => 'tor_records_user'));
    $menu->addChild('Wyloguj', array('route' => 'fos_user_security_logout'));


    return $menu;
}

    public function panelMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Home', array('route' => 'tor_home'));
        $menu->addChild('Users', array('route' => 'tor_users'));
        $menu->addChild('Dodaj rekord', array('route' => 'records'));
        $menu->addChild('Wyloguj', array('route' => 'fos_user_security_logout'));


        return $menu;
    }

    public function loginMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Zaloguj', array('route' => 'tor_home'));
        $menu->addChild('Zarejestruj', array('route' => 'tor_home'));



        return $menu;
    }

}