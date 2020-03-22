@component('mail::message')
# Nuevo Integrante del equipo en: {{ ucfirst($employer->store->name) }}

    Ingreso: {{ fdate($employer->ingress, 'd/m/y', 'Y-m-d') }}
    Nombre:  {{ ucfirst($employer->name) }}
    Puesto:  {{ ucfirst($employer->job)}}
    Edad:    {{ $employer->age }} años

@endcomponent
