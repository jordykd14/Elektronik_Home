<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'users';

    //ini declare primarykeynya
    protected $primaryKey = 'id_user';

    //ini buat tipedata dari primarykey
    protected $keyType = 'integer';

    //unutk mematikan increment
    //public $incrementing = false;

    //ini digunakan untuk memberitahu bahwa saya tidak mengunakan
    //created_at, updated_at, dan deleted_at
    public $timestamps = false;
}
