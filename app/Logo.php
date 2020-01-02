<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of Product
 *
 * @author icefy
 */
use Illuminate\Database\Eloquent\Model;

class Logo extends Model {

    //put your code here
    protected $fillable = ['title', 'logo_image', 'favicon_image', 'in_use', 'updated_at', 'created_at'];

}
