<?php

Kirby::plugin('wearecandyblue/robots', [
  'options' => [
    'allow' => '',
    'disallow' => '/',
    'sitemap' => ''
  ],
  'routes' => [
    [
      'pattern' => 'robots.txt',
      'action'  => function () {
        $data = [
          'User-agent' => '*',
        ];
        if(option('wearecandyblue.robots.allow')) {
          $data['Allow'] = option('wearecandyblue.robots.allow');
        } elseif(option('wearecandyblue.robots.disallow')) {
          $data['Disallow'] = option('wearecandyblue.robots.disallow');
        };
        if(option('wearecandyblue.robots.sitemap')) {
          $data['Sitemap'] = u(option('wearecandyblue.robots.sitemap'));
        }
        $data = urldecode(http_build_query($data, ':', PHP_EOL));
        $data = str_replace('=', ':', $data);
        return new Response($data, 'text/plain');
      }
    ]
  ]
]);
