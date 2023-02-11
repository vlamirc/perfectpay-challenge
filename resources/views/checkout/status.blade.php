<x-layout title="Status">
    <h5>Pagamento ID #{{ $id }}</h5>

    <hr>

    <div class="spinner-border" role="status" id="spinner">
        <span class="visually-hidden">Aguarde...</span>
    </div>

    <div id="statusScreenBrick_container"></div>

    <x-brick-status id="{{ $id }}"/>
</x-layout.main>
