@php
    if ($slot == "en attente") {
        $statut_class = 'en-attente';
    } elseif ($slot == "approuvé") {
        $statut_class = 'approuve';
    } else {
        $statut_class = 'rejeter';
    }
@endphp
<span class="statut statut-{{$statut_class}}">
    {{$slot}}
</span>
