<?php

Kirby::plugin('wearecandyblue/robots', [
  'routes' => [
    [
      'pattern' => 'robots.txt',
      'action'  => function () {
        $data = [
          'User-agent' => '*',
          'Allow'   => '/',
        ];
        $txt = Txt::encode($data)
        return new Response($txt, 'text/plain');
      }
    ]
  ]
]);
