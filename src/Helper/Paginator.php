<?php

namespace App\Helper;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Paginator
{
    public $links = [];

    public function __construct(
        UrlGeneratorInterface $urlGeneratorInterface,
        int $count,
        string $routeName,
        int $page = ProductRepository::DEFAULT_PAGE,
        int $perPage = ProductRepository::DEFAULT_PERPAGE,
        array $routeParams = []
    ) {
        if ($count > 0) {
            $nbPage = ceil($count / $perPage);
            if ($nbPage > 1) {
                $links[] = [
                    'label' => 'previous',
                    'url' => $urlGeneratorInterface->generate($routeName, array_merge(['page' => ($page - 1 < 0 ? 1 : $page - 1), 'perPage' => $perPage]), $routeParams),
                    'type' => 'control',
                    'isCurrent' => false,
                    'isActive' => ($page - 1 > 0),
                ];
            }
            for ($i = 1; $i <= $nbPage; $i++) {
                $links[] = [
                    'label' => $i,
                    'url' => $urlGeneratorInterface->generate($routeName, array_merge(['page' => $i, 'perPage' => $perPage]), $routeParams),
                    'type' => 'page',
                    'isCurrent' => ($page == $i),
                    'isActive' => true,
                ];
            }
            if ($nbPage > 1) {
                $links[] = [
                    'label' => 'next',
                    'url' => $urlGeneratorInterface->generate($routeName, array_merge(['page' => ($page + 1 < $nbPage ? $nbPage : $page + 1), 'perPage' => $perPage]), $routeParams),
                    'type' => 'control',
                    'isCurrent' => false,
                    'isActive' => ($page + 1 > $nbPage),
                ];
            }
        }
    }
}
