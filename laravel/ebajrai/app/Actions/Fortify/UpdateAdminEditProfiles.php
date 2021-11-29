<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesAdminEditProfiles;

class UpdateAdminEditProfiles implements UpdateAdminEditProfiles
{
    /**
     * 
     *
     * @param  mixed  $admin
     * @param  array  $input
     * @return void
     */
    public function update($admin, array $input)
    {
        Validator::make($input, [
            'desc' => ['required', 'string', 'max:1000'],
            'monThu' => ['required', 'string', 'max:255'],
            'friday' => ['required', 'string', 'max:255'],
            'saturday' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:500'],
            'phoneNum' => ['required', 'string', 'max:255'],
            'fax' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateAbout');
    }

    /**
     * 
     *
     * @param  mixed  $admin
     * @param  array  $input
     * @return void
     */
    protected function updateEditedAbout($admin, array $input)
    {
        $user->forceFill([
            'desc' => $input['desc'],
            'monThu' => $input['monThu'],
            'friday' => $input['friday'],
            'saturday' => $input['saturday'],
            'location' => $input['location'],
            'phoneNum' => $input['phoneNum'],
            'fax' => $input['fax'],
            
        ])->save();

        
    }
}
