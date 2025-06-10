# Удобный Менеджер Транзакций и Простая Галерея

 Этот проект показывает, как работать с транзакциями в JSON-файле, сортировать, фильтровать и выводить красивую таблицу. Плюс в папке **photo** есть простая галерея изображений.

## Структура проекта

- **functions.php** — тут живут все функции для работы с транзакциями:
  - `loadTransactions(string $filename): array` — загружает данные из JSON или возвращает пустой массив.
  - `saveTransactions(string $filename, array $transactions): void` — сохраняет массив обратно в файл.
  - `calculateTotalAmount(array $transactions): float` — считает сумму всех транзакций.
  - `findTransactionByDescription(string $desc, array $transactions): array` — ищет транзакции по описанию.
  - `findTransactionById(int $id, array $transactions): ?array` — находит транзакцию по ID или возвращает null.
  - `findTransactionByIdFilter(int $id, array $transactions): array` — альтернатива через `array_filter`.
  - `daysSinceTransaction(string $date): int` — считает, сколько дней прошло с даты транзакции.
  - `addTransaction(string $filename, array $transactions, float $amount, string $date, string $desc, string $merchant): void` — добавляет новую транзакцию и сохраняет в файл.
  - `sortTransactionsByDate(array &$transactions): void` — сортирует массив транзакций по дате.
  - `sortTransactionsByAmount(array &$transactions): void` — сортирует по сумме (по убыванию).

- **index.php** — точка входа:
  1. Подключает `functions.php`.
  2. Загружает транзакции из `transaction.json`.
  3. Сортирует их по дате и сумме.
  4. Выводит таблицу и итоговую сумму (`calculateTotalAmount`).
  5. Подключает шапку/подвал из папки **photo**.

- **photo/** — простая галерея:
  - `main.php` — сканирует папку `photo/image` и рисует `<img>` для каждого файла.
  - `header.php` и `footer.php` — общий шаблон страницы.
  - `css/style.css` — стили для галереи.
  - `image/` — тут лежат картинки `.jpg`.

## Что такое массивы в PHP?

Массивы — это такие списки (или словари) значений, где каждому элементу можно дать ключ. В массив можно хранить числа, строки, другие массивы и даже объекты.

Примеры:
```php
// Нумерованный массив
$fruits = ['apple', 'banana', 'cherry'];

// Ассоциативный массив
$user = [
    'name' => 'Alex',
    'age'  => 30,
    'tags' => ['php', 'js', 'css'],
];
```

## Как создать массив?

1. Коротко с помощью `[]`:
   ```php
   $arr = [1, 2, 3];
   ```
2. Через функцию `array()`:
   ```php
   $arr = array('a', 'b', 'c');
   ```

## Для чего нужен `foreach`?

Цикл `foreach` — это самый удобный способ пройтись по каждому элементу массива (или любому объекту, реализующему `Traversable`).

- Перебор значений:
  ```php
  foreach ($fruits as $fruit) {
      echo $fruit . "\n";
  }
  ```

- Перебор ключ-значение:
  ```php
  foreach ($user as $key => $value) {
      echo "$key: $value\n";
  }
  ```

`foreach` автоматически берёт следующий элемент, так что никаких лишних условий — идеальный вариант для работы с массивами.