# КСД
This for Family Leisure Club company

Environment: Ubuntu 20.04, nginx, PHP 8.1, MySql 8.0

Тестові завдання.

## Завдання 1.
У фірмі, яка займається розробкою проектів, кожен із співробітників може брати участь у 1 і більше проектах, і кожен проект може мати 1 і більше учасників.
1) Спроектувати базу даних. Опишіть її схематично (назва таблиці та її поля)

База данных для этого проекта содержит 4 таблицы. Три таблицы используются в первом и втором заданиях и одна таблица используется в третьем задании.
### Структура БД:
![image](https://github.com/makc120264/ksd/assets/17950142/7c99f658-bf88-40a9-b41f-40bc0db60a7e)

Ниже приведены скришоты структуры таблиц.
### Таблица "participants" - служит для записи данных сотрудников фирмы (п.1):
![image](https://github.com/makc120264/ksd/assets/17950142/acbf7240-f68b-4ba3-a32b-a9c84777545c)

### Таблица "projects" - служит для записи данных проектов фирмы (п.1)
![image](https://github.com/makc120264/ksd/assets/17950142/3ee20b0a-5e29-448c-a576-5754c7e58e08)

### Таблица "prodject_to_participant" - предназначена для организации связи many-to-many (многие ко многим) между таблицами "participants" и "projects"
![image](https://github.com/makc120264/ksd/assets/17950142/38b57cd6-f6d0-4e19-941a-f0ef1cc4a863)

2) Написати скрипт на PHP який виводить на екран у вигляді таблиці ім'я співробітника та кількість проектів, в яких він бере участь, у порядку зростання кількості.
### Скрипт находится тут: ‎User.getUserProjects
3) Виділити непарні рядки таблиці якимось кольором.
   ### Результат работы скрипта:
   ![image](https://github.com/makc120264/ksd/assets/17950142/e2c48b7c-5d33-48f9-a8a0-c4b56b5d5d00)

## Завдання 2.
Написати простий скрипт авторизації на сайті. Після успішної авторизації користувачеві доступна сторінка, назвемо її PAGE, яка неавторизованому користувачеві недоступна.
Сайт складається з 2-х сторінок (головна та PAGE)
Скрипт повинен задовольняти такі умови:
1) При оновленні сторінки PAGE авторизація повинна зберігатися,
2) При закритті та відкритті браузера авторизація повинна зберігатися,
3) При відкритті користувачем сторінки авторизації (у нашому випадку головної сторінки сайту) його автоматично слід перекидати на сторінку PAGE
4) На сторінці PAGE можна вийти з авторизації
   
   Результатом выполнения этого задания стал сайт, который включает выполнение этого задания, а так же Заданий 3 и 4.
   ### Вот скриншоты, которые относятся к заданию 2:
   Форма авторизации:
   ![image](https://github.com/makc120264/ksd/assets/17950142/4bf78637-6c1a-4ab6-996b-9666d8173274)
   
   Страница PAGE:
   ![image](https://github.com/makc120264/ksd/assets/17950142/75909fc2-8e62-4e9e-897e-2e7cce949e56)

## Завдання 3.
Є API обробки замовлень. Для того, щоб отримати стан замовлення, необхідно надіслати POST – запит на адресу http://api.site.ua/order/get_status.
Параметром у запиті є id – замовлення.
У відповіді на коректний запит повертається JSON-подання з результатом у вигляді рядка
{"result": TEXT},
де TEXT – стан замовлення.
Написати скрипт на PHP і використовуючи CURL по id замовленню отримати його стан.
### Скриншот выполнения Задания 3:
![image](https://github.com/makc120264/ksd/assets/17950142/fa809d2f-5a77-47d5-82ca-6ca34fab7981)

## Завдання 4.
Написати селектор jQuery, який вибирає з html-документа всі текстові елементи введення, у яких імена починаються з «photo». Призначити всім знайденим елементам значення, що дорівнює порядковому номеру елемента на сторінці.
### Это скрипт:
![image](https://github.com/makc120264/ksd/assets/17950142/c1626015-eeb5-43cf-b1f4-fc9f6effab55)

### Скриншот выполнения Задания 4:
![image](https://github.com/makc120264/ksd/assets/17950142/101cc63d-766f-462c-881f-b7653a7758de)

