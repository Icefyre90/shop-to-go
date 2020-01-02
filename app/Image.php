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

class Image extends Model {

    //put your code here
    protected $fillable = ['text', 'img_site', 'in_use', 'type', 'updated_at', 'created_at'];

}