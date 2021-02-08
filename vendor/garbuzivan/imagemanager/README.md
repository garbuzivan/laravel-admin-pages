# Image Manager: библиотека для работы с изображениями + расширение для Laravel

## Установка

`composer require garbuzivan/imagemanager`

<p>При использовании стандартного Transport класса пакет не подразуемвает хранение данных об изображениях 
и при использовании методов поиска и хранения будет возвращать пустые данные.</p>

<p>EloquentTransport - подразумевает использование Laravel Eloquent, предварительно требует публикации конфигурации и миграции.</p>

### Laravel
<p>и опубликовать конфигурацию</p>

`php artisan vendor:publish  --force --provider="GarbuzIvan\ImageManager\ImageManagerServiceProvider" --tag="config"`

<p>Теперь нужно применить миграции:</p>

`php artisan migrate`

## Архитектура библиотеки

## Использование

### Загрузка Laravel конфига из файла 
`$config = new GarbuzIvan\ImageManager\Laravel\Config;`

### Экземпляр класса ImageManager
`$image = new GarbuzIvan\ImageManager\ImageManager($config);`

### Загрузка ищображения по ссылке
`$img = $image->load('https://zebrains.ru/static/images/intep_case_preview.4865ac.jpg');`

### Загрузка ищображения из файла
`$img = $image->load($_FILES["fileToUpload"]["tmp_name"]);`

### Загрузка ищображения из строки base64
`$img = $image->load('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH1ggDCwMADQ4NnwAAAFVJREFUGJWNkMEJADEIBEcbSDkXUnfSgnBVeZ8LSAjiwjyEQXSFEIcHGP9oAi+H0Bymgx9MhxbFdZE2a0s9kTZdw01ZhhYkABSwgmf1Z6r1SNyfFf4BZ+ZUExcNUQUAAAAASUVORK5CYII=');`

### Сохранение загруженного файла $title название изображения, удобно использовать для поиску по содержимому и в СЕО
`$img->save(string $title = null);`

### Вывод изображения на экран
`echo $img->response();`

### Поиск изображения по ID
`$image->getByID(1)->getImage();`

### Поиск изображения по hash
`$image->getByHash('5b041cd17933badbb7658de2b45ba8de188df628')->getImage();`

### Поиск изображения по filesize
<p>Аргументы применяют значения в формате int, если установить null - аргумент не будет учитываться при поиске</p>

`$list = $image->getByFileSize($minFileSize = null, $mxnFileSize = null, int $limitItem = 10, int $numberPage = 1);`

<p>Метод возвращает массив изображений соответствующих запросу.</p>

### Поиск изображения по минимальному и максимальному размеру высоту и ширины
<p>Аргументы применяют значения в формате int, если установить null - аргумент не будет учитываться при поиске</p>

`$list = $image->getBySize(int $minWidth = null, int $maxWidth = null, int $minHeight = null, int $maxHeight = null, int $limitItem = 10, int $numberPage = 1);`

<p>Метод возвращает массив изображений соответствующих запросу.</p>

### Поиск изображения по title

<p>Аргумент применяет значения в формате string, если установить null - аргумент не будет учитываться при поиске</p>

`$list = $ImageManager->getTitle('%Тестовое%', int $limitItem = 10, int $numberPage = 1);`

<p>Метод возвращает массив изображений соответствующих запросу.</p>


### Обновление title изображения

`$img = $ImageManager->getByID(2)->getImage(); `

`$img['title'] = 'Тестовое ZB изображение';`

`$ImageManager->update($img);`


### Подключение изображения к итему компонента

<p>Аргумент компонента имеет тип строки, что позволяет делать более сложные варианты использования, но по умолчанию можно передать например параметр (news)</p>
<p>Аргумент итема - тип int храним например id новости</p>

`$img[] = $ImageManager->getByID(1)->getImage();`

`$img[] = $ImageManager->getByID(2)->getImage();`

`$ImageManager->setUse($img, 1, 'news');`

<p>или</p>

`$list = $ImageManager->getTitle('%Звезды%', 10, 1);`

`$ImageManager->setUse($list, 1, 'news');`


### Получить список используемых изображений в итеме компонента

`$images =  $ImageManager->getUse(1, 'news');`

<p>В качестве ключа елементов передается ID использования изображения, по которому можно удалять изображения из использования в итеме компонента</p>


### Удалить использование изображения из итема компонента

`$ImageManager->dropUse([5,7,31], 1, 'news');`

### Полное удаление изображения с сервера

`$ImageManager->getByID(9)->drop();`

<p>или</p>

`$list = $ImageManager->getTitle('%Звезды%', 10, 1);`

`$ImageManager->drop($list);`


<pre>
$config = new \GarbuzIvan\ImageManager\Laravel\Config;
$imageManager = new \GarbuzIvan\ImageManager\ImageManager($config);
$img = $imageManager->load('https://zebrains.ru/static/images/intep_case_preview.4865ac.jpg')->save();
$imageManager->setUse([['id' => 13], ['id' => 13], ['id' => 13]], 2, 'test');
$imageManager->dropUse([1], 2, 'test');
dd($imageManager->getUse(2, 'test'));
</pre>


### Конфигурация пакета

<p>Настроки disks ведут как правило к одной директории, относительно URL, полного пространства или относительно корня проекта для генерации ссылок на изображения.</p>

<br /><br />

<p>Настройка cache позвляет определеить стандартные варианты нарезки изображения после сохранения оригенала.</p>

<br /><br />

<p>Директива transport - позволяет написать свое решение работы с базой, отличное от реализации на Laravel. </p>
<p>Требуется наследование \GarbuzIvan\ImageManager\Transport\AbstractTransport</p>

<br /><br />

<p>Директива pipes - позволяет написать свои реализации обработки изображения после загрузки на сервер, например если необходимо накладывать водяные знаки. </p>
<p>Требуется наследование \GarbuzIvan\ImageManager\Pipes\AbstractPipes</p>

## Тестирование

`./vendor/bin/phpunit ./vendor/garbuzivan/imagemanager/tests`
