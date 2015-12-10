# workflow-zf2-engine

[![Build Status](https://secure.travis-ci.org/old-town/workflow-zf2-engine.svg?branch=dev)](https://secure.travis-ci.org/old-town/workflow-zf2-engine)
[![Coverage Status](https://coveralls.io/repos/old-town/workflow-zf2-engine/badge.svg?branch=dev&service=github)](https://coveralls.io/github/old-town/workflow-zf2-engine?branch=dev)

# Функционал модуля

Модуль обеспечивает
единую точку входа, для создания процесса workflow и запуска перехода из одного состояния в другое.

# EngineController

Модуль предоставляет единую точку входа, для взаимодействия с workflow

## Роутинг

## Роутер workflow/engine/initialize

Создание нового процесса workflow осуществляется если вызвать http запрос, попадающий под роутер workflow/engine/initialize.
По умолчанию url будет выглядить следующим образом

```php
    /workflow/engine/manager/ИМЯ_МЕНЕДЖЕРА_WORKFLOW/action/ИМЯ_ДЕЙСТВИЯ/name/ИМЯ_WORKFLOW
```

Т.е. необходимо передать следующие параметры
* ИМЯ_МЕНЕДЖЕРА_WORKFLOW - имя зарегестрированного [менеджера](workflow-manager.md)
* ИМЯ_ДЕЙСТВИЯ - имя инициализирующего действия 
* ИМЯ_WORKFLOW - имя workflow. Данное workflow должно быть зарегестрированно в менеджере workflow



## Роутер workflow/engine/doAction

Переход в другое состояние осуществляется если вызвать  http запрос, попадающий под роутер workflow/engine/doAction.
По умолчанию url будет выглядить следующим образом

```php
    /workflow/engine/manager/ИМЯ_МЕНЕДЖЕРА_WORKFLOW/action/ИМЯ_ДЕЙСТВИЯ/entry/ID_ЗАПУЩЕННОГО_ПРОЦЕССА_WORKFLOW
```

Т.е. необходимо передать следующие параметры
* ИМЯ_МЕНЕДЖЕРА_WORKFLOW - имя зарегестрированного [менеджера](workflow-manager.md)
* ИМЯ_ДЕЙСТВИЯ - имя инициализирующего действия 
* ID_ЗАПУЩЕННОГО_ПРОЦЕССА_WORKFLOW - идендификатор запущенного процесса workflow. 

## Controller

Модуль предоставляет контроллер реализующий обработку таких запросов как инициация нового процесса workflow, или 
переход в другое состояние. Весь базовый функционал сосредоточен в [EngineController](./../../src/Controller/EngineController.php)
