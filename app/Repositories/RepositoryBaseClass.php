<?php
namespace App\Repositories;

use App\Traits\PaginateTrait;
use Illuminate\Database\Eloquent\Model;
class RepositoryBaseClass extends Filter
{
    use PaginateTrait;

}
