<x-layout title="Pagamento">
    <h5>Email</h5>
    <p>{{ $email }}</p>

    <h5>Produto</h5>
    <p>{{ $item['description'] }}</p>

    <h5>Valor</h5>
    <p><b class="text-danger">R$ {{ $item['value'] }}</b></p>

    <hr>

    <div class="spinner-border" role="status" id="spinner">
        <span class="visually-hidden">Aguarde...</span>
    </div>

    <div id="paymentBrick_container"></div>

    <x-brick email="{{ $email }}" amount="{{ $item['value'] }}"/>
</x-layout.main>
