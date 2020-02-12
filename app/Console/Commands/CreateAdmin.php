<?php

namespace App\Console\Commands;

use App\Entities\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * Create admin
     *
     * @var string
     */
    protected $description = 'Create a new admin';
    /**
     * @var Factory
     */
    private $validatorFactory;
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * Create a new command instance.
     *
     * @param Factory $validatorFactory
     * @param Hasher $hasher
     * @return void
     */
    public function __construct(Factory $validatorFactory, Hasher $hasher)
    {
        parent::__construct();
        $this->validatorFactory = $validatorFactory;
        $this->hasher = $hasher;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $values = $this->askQuestions();
        $this->showErrors($this->validatorFactory->make($values, $this->rules(), $this->messages()));

        $user = User::create([
            'email' => $values['email'],
            'password' => $this->hasher->make($values['password']),
            'role' => User::ROLE_ADMIN
        ]);

        $this->info('Пользователь создан.');
    }

    /**
     * Get admin data from console.
     *
     * @return array
     */
    private function askQuestions(): array
    {
        $values = [];
        $values['email'] = $this->ask('Введите email');
        $values['password'] = $this->ask('Введите пароль (не меннее 8 символов)');
        $values['password_confirmation'] = $this->ask('Повторите пароль');
        return $values;
    }

    /**
     * Displays validation errors and terminates script
     *
     * @param ValidatorContract $validator
     * @return void
     */
    private function showErrors(ValidatorContract $validator): void
    {
        if ($validator->fails()) {
            $this->error('Администратор не создан по причине:' . PHP_EOL);

            foreach ($validator->errors()->all() as $error) {
                $this->comment($error);
            }

            die;
        }
    }

    /**
     * Rules for validation.
     *
     * @return array
     */
    private function rules(): array
    {
        return [
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:8|max:255',
            'password_confirmation' => 'required|string|min:8|max:255|same:password',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    private function messages(): array
    {
        return [
            'email.required' => 'Email обязателен для заполнения',
            'email.string' => 'Значение поля Email  должно быть строкой',
            'email.email' => 'Некорректный адрес электронной почты',
            'email.max' => 'Email не должен превышать 255 символов',
            'email.unique' => 'Пользователь с таким Email уже существует',

            'password.required' => 'Пароль обязателен для заполнения',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль должен быть не короче 8 символов',
            'password.max' => 'Длина пароля не должна превышать 255 символов',

            'password_confirmation.required' => 'Вы ввели разные значения пароля',
            'password_confirmation.string' => 'Вы ввели разные значения пароля',
            'password_confirmation.min' => 'Вы ввели разные значения пароля',
            'password_confirmation.max' => 'Вы ввели разные значения пароля',
            'password_confirmation.same' => 'Вы ввели разные значения пароля',
        ];
    }
}
