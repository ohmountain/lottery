<?php

/**
 * 读取抽奖组件配置
 * @author renshan<1005110700@qq.com>
 */

namespace LotteryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder    = new TreeBuilder;

        $rootNode       = $treeBuilder->root('lottery');

        $rootNode->children()
            ->scalarNode('wx_sign_api')->isRequired()->end()
            ->scalarNode('statistics_api')->isRequired()->end();

        return $treeBuilder;
    }
}

