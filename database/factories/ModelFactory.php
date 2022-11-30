<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblTipoAnimal::class, static function (Faker\Generator $faker) {
    return [
        'id_tipo_animal' => $faker->randomNumber(5),
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'habilitado' => $faker->boolean(),
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblAnimal::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'id_tipo_animal' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblCliente::class, static function (Faker\Generator $faker) {
    return [
        'nombres' => $faker->sentence,
        'apellidos' => $faker->sentence,
        'dui' => $faker->sentence,
        'fecha_nacimiento' => $faker->date(),
        'img' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblProveedor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'fecha' => $faker->date(),
        'estado' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblArticulo::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'cantidad' => $faker->randomNumber(5),
        'precio' => $faker->randomFloat,
        'estado' => $faker->randomNumber(5),
        'id_animal' => $faker->randomNumber(5),
        'id_proveedor' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblFactura::class, static function (Faker\Generator $faker) {
    return [
        'id_cliente' => $faker->randomNumber(5),
        'fecha' => $faker->date(),
        'estado' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TblFacturaDetalle::class, static function (Faker\Generator $faker) {
    return [
        'id_factura' => $faker->randomNumber(5),
        'id_articulo' => $faker->randomNumber(5),
        'cantidad' => $faker->randomNumber(5),
        'precio_unitario' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
