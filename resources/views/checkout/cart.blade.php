<x-layout title="Carrinho">
    <div class="alert alert-primary" role="alert">
        Digite seu email, escolha o produto e clique em <b>Comprar</b>
    </div>

    <form method="POST" action="{{ route('checkout.payment') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        @foreach ($items as $item)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="item" id="item-{{ $item['id'] }}" value="{{ $item['id'] }}">
                <label class="form-check-label" for="item-{{ $item['id'] }}">
                    {{ $item['description'] }} - R$ {{ $item['value'] }}
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-lg btn-primary mt-4">Comprar</button>
    </form>
</x-layout.main>
