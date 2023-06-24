<?php

namespace Asapo\DailyHub\SuluBundle\Admin;

use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Admin\Navigation\NavigationItem;
use Sulu\Bundle\AdminBundle\Admin\Navigation\NavigationItemCollection;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilder;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;

class DailyHubAdmin extends Admin
{
    public function configureNavigationItems(NavigationItemCollection $navigationItemCollection): void
    {
        $media = new NavigationItem('dailyhub.chat');
        $media->setPosition(30);
        $media->setIcon('su-chat');
        $media->setView('dailyhub.chat');

        $navigationItemCollection->add($media);
    }

    public function configureViews(ViewCollection $viewCollection): void
    {
        $viewCollection->add(
            new ViewBuilder('dailyhub.chat', '/chat', 'dailyhub.chat'),
        );
    }
}
