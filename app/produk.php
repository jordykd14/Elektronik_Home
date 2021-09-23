<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';

    //ini declare primarykeynya
    protected $primaryKey = 'id_produk';

    //ini buat tipedata dari primarykey
    protected $keyType = 'varchar';

    //unutk mematikan increment
    //public $incrementing = false;

    //ini digunakan untuk memberitahu bahwa saya tidak mengunakan
    //created_at, updated_at, dan deleted_at
    public $timestamps = false;
}
