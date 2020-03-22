@component('mail::message')
# Nuevo empleado en: {{ ucfirst($employer->store->social) }}

    Ingreso: {{ fdate($employer->ingress, 'd/m/y', 'Y-m-d') }}
    Nombre:  {{ ucfirst($employer->name) }}
    Puesto:  {{ ucfirst($employer->job)}}
    Sueldo:  {{ fnumber($employer->store->salary) }} quincenales

@endcomponent
