# Laravel Encryptable Trait

Provides a trait to decrypt or encrypt values in a Laravel model.

## Usage

Add the trait to your model, define the ```$encrypted``` array and fields in it will be encrypted and decrypted on the fly by default.

```php
namespace App;

use Cheezykins\LaravelEncryptable\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model {
    use Encryptable;

    protected $encrypted = [
        'email'
    ];
}
```

Then in usage:

```php
$model = new MyModel();
$model->name = 'Chris';
$model->email = 'chris@test.com';
$model->save();
```

The email field in the database will now be the encrypted value.

```eyJpdiI6IkRZS0lOUlwvR29MbU4zN1diYzl2ZCtnPT0iLCJ2YWx1ZSI6IldEYzVUajlUcDdvVHE0M0kxdForNlE9PSIsIm1hYyI6ImY1MzQ2ZWYwNTNkZDI2YTY2MDgyMmVjZmU3MmI0MGU0NTNmMmU4NWE4OGFmYzZhYTJlYzczMWU1YTdmNzNjYjQifQ==```

When retrieved, the data will be automatically decrypted for you.

```php
$model = MyModel::find(1);
echo $model->email;
```
```> "chris@test.com"```

Same for other ways of accessing model data.

```php
$model = MyModel::find(1);
return response()->json($model->toArray());
```

```json
{
  "id": 1,
  "name": "Chris",
  "email": "chris@test.com"
}
```

**WARNING**

The encrypted value is stored based on your Laravel APP_KEY using the algorithm defined in your config/app.php cipher setting. If your application key is changed or lost there is **no way** to retrieve the data.

## Installation

require the project and use it. There is no service provider as it is not needed.

```composer require cheezykins/laravel-encryptable```