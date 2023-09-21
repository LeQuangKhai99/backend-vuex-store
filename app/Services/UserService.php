<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function paginate() {
        return $this->userRepository->paginate();
    }

    public function getByEmail($email) {
      return $this->userRepository->getBy(['email' => $email]);
    }

    public function store($req) {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ];
        return $this->userRepository->create($data);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }

    public function findOne($id) {
        return $this->userRepository->find($id);
    }

    public function update($id, $req) {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
        ];

        if($req->password) {
            $data['password'] = Hash::make($req->password);
        }
        
        return $this->userRepository->update($id, $data);
    }
}
