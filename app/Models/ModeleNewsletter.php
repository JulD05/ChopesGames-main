<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeleNewsLetter extends Model
{

    protected $table = 'nouvelles';
    protected $allowedFields = ['OBJET', 'TITRE', 'MESSAGE'];
    protected $primaryKey = 'OBJET';


}