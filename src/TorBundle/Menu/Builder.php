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
$menu->addChild('Users', array('route' => 'tor_users'));
$menu->addChild('Calendar', array('route' => 'tor_calendar'));
$menu->addChild('Instruktorzy', array('route' => 'tor_instructors'));
$menu->addChild('Wyloguj', array('route' => 'fos_user_security_logout'));


return $menu;
}
}