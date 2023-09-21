<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\EloquentBaseRepository;

class UserRepository extends EloquentBaseRepository {
    public function __construct(User $user) {
        parent::__construct($user);
    }

    public function paginate() {
        return $this->model->paginate(config('app.paginate'));
    }
}