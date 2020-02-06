<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\User;

class MakeAdmin extends Command
{
    protected $signature = 'user:role {email} {role}';

    protected $description = 'Change role';

    public function handle()
    {
        $email = $this->argument('email');
        $role = $this->argument('role');

        if (!$user = User::where('email', $email)->first()) {
            $this->error('Пользователь с e-mail "' . $email . '" не найден.');
            return false;
        }

        try {
            $user->changeRole($role);
        } catch (\DomainException $exception) {
            $this->error($exception->getMessage());
            return false;
        }

        $this->info('Роль успешно назначена.');
        return true;
    }
}
