# StopTheWar

![Tests](https://github.com/brzuchal/stop-the-war/actions/workflows/continous-integration.yml/badge.svg)

---

## A message to Russian 🇷🇺 people

If you currently live in Russia, please read [this message](./ToRussianPeople.md).

## Purpose

A Stop The War sniff adding non-collapsable comment calling to stop the wars in source code files.

[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

## Install

```shell
composer require brzuchal/stop-the-war
```

## Usage

Basic usage just adds general `#StopTheWar` comment, a minimum setup requirement is to include `StopTheWar` rule, as follows:

```xml
<?xml version="1.0"?>
<!-- phpcs.xml.dist -->
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd">
    <rule ref="StopTheWar"/>
</ruleset>
```

Results in adding stop war comment with no additional text, as follows:

```php
// #StopWar 
class MyService
{
}
```

However, if you'd like to promote any kind of extended comment define rule property called `commentExtension`, as for eg.:

```xml
<?xml version="1.0"?>
<!-- phpcs.xml.dist -->
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd">
    <rule ref="StopTheWar">
        <properties>
            <property name="commentExtension" value="🇺🇦 #StandWithUkraine #StopPutin"/>
        </properties>
    </rule>
</ruleset>
```

Results in adding comment in front of every class, interface, trait, enum as follows:

```php
// #StopWar 🇺🇦 #StandWithUkraine #StopPutin
class MyService
{
}
```

---

## License

MIT License

Copyright (c) 2022 Michał Marcin Brzuchalski

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
