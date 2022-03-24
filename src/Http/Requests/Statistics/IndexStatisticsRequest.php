<?php

namespace Fligno\SimpleStatistics\Http\Requests\Statistics;

use Fligno\StarterKit\Requests\FormRequest;

/**
 * Class IndexStatisticsRequest
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class IndexStatisticsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            //
        ]);
    }
}

