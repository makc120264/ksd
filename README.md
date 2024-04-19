# KCD
This for Family Leisure Club company

Тестові завдання.

Завдання 1.
У фірмі, яка займається розробкою проектів, кожен із співробітників може брати участь у 1 і більше проектах, і кожен проект може мати 1 і більше учасників.
1) Спроектувати базу даних. Опишіть її схематично (назва таблиці та її поля)
2) Написати скрипт на PHP який виводить на екран у вигляді таблиці ім'я співробітника та кількість проектів, в яких він бере участь, у порядку зростання кількості.
3) Виділити непарні рядки таблиці якимось кольором.

Завдання 2.
Написати простий скрипт авторизації на сайті. Після успішної авторизації користувачеві доступна сторінка, назвемо її PAGE, яка неавторизованому користувачеві недоступна.
Сайт складається з 2-х сторінок (головна та PAGE)
Скрипт повинен задовольняти такі умови:
1) При оновленні сторінки PAGE авторизація повинна зберігатися,
2) При закритті та відкритті браузера авторизація повинна зберігатися,
3) При відкритті користувачем сторінки авторизації (у нашому випадку головної сторінки сайту) його автоматично слід перекидати на сторінку PAGE
4) На сторінці PAGE можна вийти з авторизації

Завдання 3.
Є API обробки замовлень. Для того, щоб отримати стан замовлення, необхідно надіслати POST – запит на адресу http://api.site.ua/order/get_status.
Параметром у запиті є id – замовлення.
У відповіді на коректний запит повертається JSON-подання з результатом у вигляді рядка
{"result": TEXT},
де TEXT – стан замовлення.
Написати скрипт на PHP і використовуючи CURL по id замовленню отримати його стан.

Завдання 4.
Написати селектор jQuery, який вибирає з html-документа всі текстові елементи введення, у яких імена починаються з «photo». Призначити всім знайденим елементам значення, що дорівнює порядковому номеру елемента на сторінці.
