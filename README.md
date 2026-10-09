# Шаблон приложения ColdOS — PHP

Заготовка приложения ColdOS на PHP.

> ColdOS исполняет JavaScript. PHP-код не запускается как есть:
> `cldcli build` конвертирует поддерживаемое подмножество в JS
> (парсер `prphp.js`).

## Создание проекта

```bash
cldcli init myapp --lang php
```

## Поддерживаемое подмножество

| Возможность | Пример |
|---|---|
| Точка входа | `function user_run_application_<id>() { }` |
| Переменные | `$x = "строка"` → `const x = "строка"` |
| Интерполяция | `"текст $x и ${y}"` → `` `текст ${x} и ${y}` `` |
| Словари | `['k' => v]`, `array('k' => v)` → `{ k: v }` |
| Списки | `[1, 2, 3]` → `[1, 2, 3]` |
| Многострочные строки | `<<<HTML ... HTML;` |
| Логика | `if (...) { }`, `elseif`, `else` |
| Циклы | `foreach ($a as $v) { }` → `for (const v of a)` |
| Вывод | `echo "..."` → `console.log(...)` |
| Вызовы ColdOS | `Window_add(...)`, `popup(...)` |

**Не поддерживается:** классы, интерфейсы, трейты, `namespace`,
генераторы, замыкания (`function() use`), `match`, `enum`,
стрелочные функции `fn()`, цикл `for ($i = 0; ...)`.

## Структура

```
myapp/
├── src/
│   ├── main.php         # код приложения
│   ├── index.css        # стили
│   └── coldos.d.ts      # декларации ColdOS API
├── assets/              # иконки
├── package.json
└── README.md
```

## Сборка

```bash
cldcli build
```