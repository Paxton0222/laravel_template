<?php
namespace App\Repositories;
use App\Exceptions\UserExistsException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements CrudByIdRepositoryInterface
{
    use CrudByIdRepository;

    private User|string $model;

    public function __construct()
    {
        $this->initModel(User::class);
    }

    /**
     * 創建用戶.
     *
     * @throws UserExistsException
     */
    public function createUser(array $user_data): User
    {
        $user = new User;
        $query = $user
            ->whereName($user_data['name'])
            ->whereEmail($user_data['email'])
        ;
        if ($query->exists()) {
            throw new UserExistsException('用戶已經存在');
        }
        $user->name = $user_data['name'];
        $user->email = $user_data['email'];
        $user->password = Hash::make($user_data['password']);
        $user->save();

        return $user->refresh();
    }

    /**
     * 查詢或創建用戶.
     */
    public function findOrCreateUser(array $user_data): User
    {
        return User::firstOrCreate(
            [
                'email' => $user_data['email'],
            ],
            [
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'password' => Hash::make($user_data['password']),
            ],
        );
    }
}
