# Addressable

**Addressable** is a polymorphic Laravel package, for contact management system. You can add address to any eloquent model with ease.

## Installation

1. Install the package via composer:
    ```shell
    composer require viitortest/addressable
    ```

2. Publish resources (migrations and config files):
    ```shell
    php artisan vendor:publish --tag=address-config
    ```
3. If you need to modify table name go to below path and change table name
    ```shell
       config/addressable.php
    ```
4. Execute migrations via the following command:
    ```shell
    php artisan migrate
    ```
5. Done!


## Usage

To add address support to your eloquent models simply use `\Viitortest\Addressable\Traits\HasContacts` trait.
`HasAddress`
### Manage your address

```php
// Get instance of your model
$user = new \App\Models\User::find(1);

// address parameter are to store address.
$request = [
    'formatted_address' => 'Avdhesh House, 303, opp. Gurudwara, Bodakdev, Ahmedabad, Gujarat 380054',
    'latitude' => '29.00',
    'longitude' => '49.00',
    'order' => 1,
    'extra_attributes' => ["country"=>"india","city"=>"ahmedabad","post"=>380051]
];

// Create a single address
$request = [
    'formatted_address' => 'Avdhesh House, 303, opp. Gurudwara, Bodakdev, Ahmedabad, Gujarat 380054',
    'latitude' => '29.00',
    'longitude' => '49.00',
    'order' => 1,
    'extra_attributes' => ["country"=>"india","city"=>"ahmedabad","post"=>380051]
];
$user->addAddress($request);

// Get attached address collection
$user->getAddress;

// Get attached address query builder
$user->getAddress();

// Removed address
$user->removeAddress();
```
