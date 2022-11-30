<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'tbl-tipo-animal' => [
        'title' => 'Tbl Tipo Animal',

        'actions' => [
            'index' => 'Tbl Tipo Animal',
            'create' => 'New Tbl Tipo Animal',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_tipo_animal' => 'Id tipo animal',
            'nombre' => 'Nombre',
            'habilitado' => 'Habilitado',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'tbl-animal' => [
        'title' => 'Tbl Animal',

        'actions' => [
            'index' => 'Tbl Animal',
            'create' => 'New Tbl Animal',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'id_tipo_animal' => 'Id tipo animal',
            
        ],
    ],

    'tbl-cliente' => [
        'title' => 'Tbl Cliente',

        'actions' => [
            'index' => 'Tbl Cliente',
            'create' => 'New Tbl Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'dui' => 'Dui',
            'fecha_nacimiento' => 'Fecha nacimiento',
            'img' => 'Img',
            
        ],
    ],

    'tbl-proveedor' => [
        'title' => 'Tbl Proveedor',

        'actions' => [
            'index' => 'Tbl Proveedor',
            'create' => 'New Tbl Proveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            
        ],
    ],

    'tbl-articulo' => [
        'title' => 'Tbl Articulo',

        'actions' => [
            'index' => 'Tbl Articulo',
            'create' => 'New Tbl Articulo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'estado' => 'Estado',
            'id_animal' => 'Id animal',
            'id_proveedor' => 'Id proveedor',
            
        ],
    ],

    'tbl-factura' => [
        'title' => 'Tbl Factura',

        'actions' => [
            'index' => 'Tbl Factura',
            'create' => 'New Tbl Factura',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_cliente' => 'Id cliente',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            
        ],
    ],

    'tbl-factura-detalle' => [
        'title' => 'Tbl Factura Detalle',

        'actions' => [
            'index' => 'Tbl Factura Detalle',
            'create' => 'New Tbl Factura Detalle',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_factura' => 'Id factura',
            'id_articulo' => 'Id articulo',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio unitario',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];