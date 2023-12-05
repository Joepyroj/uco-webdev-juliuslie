@props(['type' => 'info', 'slot'])

<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <strong>{{ $slot }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
