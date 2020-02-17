<?php

namespace App\Rules;

use App\Http\Requests\Admin\Catalog\Machines\CreateRequest;
use Illuminate\Contracts\Validation\Rule;

class UniqueValues implements Rule
{
    /**
     * @var CreateRequest
     */
    private $request;
    /**
     * @var string
     */
    private $field;

    /**
     * Create a new rule instance.
     *
     * @param CreateRequest $request
     * @param string $field
     */
    public function __construct(CreateRequest $request, string $field = 'properties')
    {
        $this->request = $request;
        $this->field = $field;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->field === 'tags') {
            foreach(array_values(array_count_values($this->request->input($this->field))) as $value) {
                if ($value > 1) {
                    return false;
                }

                return true;
            }
        }
        return array_values(array_count_values(array_column($this->request->input($this->field), 'name')))[0] === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Добавлены элементы с одинаковым значением.';
    }
}
