# php-fluent-handler-bundle

[![Build Status](https://travis-ci.com/lemonde/php-fluent-handler-bundle.svg?branch=master)](https://travis-ci.org/lemonde/php-fluent-handler-bundle)
[![Build Status](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lemonde/php-fluent-handler-bundle/?branch=master)

## Description

Everything is MIT licensed and unsupported unless otherwise stated. Use at your own risk.

This is a missing Fluentd Handler for Monolog.

## How to install ?

### Requirements

- >=PHP 7
- use `fluent/logger`
- use `monolog/monolog`

```bash
composer require lemonde/php-fluent-handler-bundle:latest
```

Add in your AppKernel.php

```php
public function registerBundles()
    {
        $bundles = [
            ....
            new FluentHandlerBundle\FluentHandlerBundle(),
        ];

        return $bundles;
    }
```

Add in your config.yml

```yml
fluent_handler:
    channel: 'test'
    host: tcp://localhost
    port: 24224
```

and for your monolog config:

```yml
monolog:
    handlers:
        service:
            type: service
            id: monolog.handler.fluent
```

## How to contribute ?

You can add an issue or create a pull request. https://github.com/lemonde/php-fluent-handler-bundle/blob/master/.github/CONTRIBUTING.md
