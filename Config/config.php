<?php
return [
    'name' => 'MoceanAPI Broadcast',
    'description' => 'This plugin is just a demo plugin, to demonstrate how to create mautic plugin.',
    'author' => 'MoceanAPI',
    'version' => '1.0.0',
    'services' => [
      'integrations' => [
          'mautic.integration.mocean' => [
              'class'=>\MauticPlugin\MoceanApiBroadcastBundle\Integration\MoceanIntegration::class,
              'arguments' => [
                  'event_dispatcher',
                  'mautic.helper.cache_storage',
                  'doctrine.orm.entity_manager',
                  'session',
                  'request_stack',
                  'router',
                  'translator',
                  'logger',
                  'mautic.helper.encryption',
                  'mautic.lead.model.lead',
                  'mautic.lead.model.company',
                  'mautic.helper.paths',
                  'mautic.core.model.notification',
                  'mautic.lead.model.field',
                  'mautic.plugin.model.integration_entity',
                  'mautic.lead.model.dnc',
              ]
          ]
      ],
      'forms'  => [
          'plugin.mocean.form' => [
              'class' => \MauticPlugin\MoceanApiBroadcastBundle\Form\Type\BroadcastType::class,
              'alias' => 'broadcast'
          ]
      ],
      'other' => [
          'mautic.mocean.service' => [
              'class' => 'MauticPlugin\MoceanApiBroadcastBundle\Services\MoceanSms',
          ]
      ],
    ],
    'routes' => [
        'main' => [
            'mautic.moceanapi_broadcast.sms_broadcast' => [
                'path' => 'sms_broadcast',
                'controller' => 'MoceanApiBroadcastBundle:MoceanApiBroadcast:broadcast',
            ],
            'mautic.moceanapi_broadcast.sms_transaction_history' => [
                'path' => 'sms_transaction_history',
                'controller' => 'MoceanApiBroadcastBundle:MoceanApiBroadcast:history',
            ],
            'mautic.moceanapi_broadcast.export_logs' => [
                'path' => 'export_logs',
                'controller' => 'MoceanApiBroadcastBundle:MoceanApiBroadcast:export',
            ],
        ],
    ],
    'menu' => [
        'main' => [
            'priority' => -1,
            'items' => [
                'mautic.mocean.menu.moceanapi_broadcast' => [
                    'id' => 'moceanapi_broadcast_menu',
                    'iconClass' => 'fa-comment',
                    'children' => [
                        'mautic.mocean.menu.sms_broadcast' => [
                            'route'  => 'mautic.moceanapi_broadcast.sms_broadcast',
                        ],
                        'mautic.mocean.menu.sms_transaction_history' => [
                            'route'  => 'mautic.moceanapi_broadcast.sms_transaction_history',
                        ],
                    ],
                ],
            ],
        ],
    ],
];