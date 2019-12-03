## Wtolk\Poster

### Connectors

* VK
* Telegram
* Odnoklassniki


### Usage
 
```php
use Wtolk\Poster\Poster; 

// Creating the poster instance
$poster = new Poster();

```

#### VK
###### Wall Post
```php
$poster->vk()->wallpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00'
]);
```
###### Wall Post with link
```php
$poster->vk()->wallpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00',
    'link' => 'http://example.com/'
]);
```
#### Telegram
###### Channel Post
```php
$poster->telegram()->channelpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00'
]);
```

###### Channel Post with link
```php
$poster->telegram()->channelpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00',
    'link' => 'http://example.com/'
]);
```

#### Odnoklassniki
###### Group Post
```php
$poster->ok()->wallpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00'
]);
```

###### Group Post with link
```php
$poster->ok()->wallpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00',
    'link' => 'http://example.com/'
]);
```

###### Group Post with image
```php
$poster->ok()->wallpost([
    'message' => 'Happy New Year',
    'execute_at' => '2020-01-01 00:00:00',
    'image_url' => 'https://designshop-6aa0.kxcdn.com/photos/send-happy-new-year-photo-cards-online-confetti-15237_90.jpg'
]);
```
>You must use the full path to your image

#### Export methods

```php
$array = $poster->toArray();
$json = $poster->toJson();
```