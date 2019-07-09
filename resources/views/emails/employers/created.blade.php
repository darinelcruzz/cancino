@component('mail::message')
# Nuevo Empleado

{{ ucfirst($employer->name) }} <br>
{{ ucfirst($employer->job)}} <br>
{{ ucfirst($employer->account_number) }} <br>

@component('mail::button', ['url' => env('APP_URL') . '/admin/empleados'])
Ver más detalles
@endcomponent

@endcomponent
