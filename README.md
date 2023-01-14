# Laravel xhprof (XHProf)

Library for profiling queries in Laravel with xhprof

## Install:
```bash
composer require lysice/laravel-xhprof
```

## Settings
Create file `xhprof.php` in `config` path with content:
```php
<?php

return [
    'enabled' => true, 
    'global_middleware' => true,
    'flags' => XHPROF_FLAGS_CPU|XHPROF_FLAGS_MEMORY|XHPROF_FLAGS_NO_BUILTINS
];
```

### Params description
Name | Default | Description
-----|---------|------------
enabled | `true` | Enabling or disabling the profiler
global_middleware | `true` | The inclusion the global middleware for profiling at any route
flags| `XHPROF_FLAGS_CPU and XHPROF_FLAGS_MEMORY and XHPROF_FLAGS_NO_BUILTINS` | parameter of xhprof_enable.