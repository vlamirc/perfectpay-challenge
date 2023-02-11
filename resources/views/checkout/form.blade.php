<x-layout title="Checkout">
    <div class="alert alert-primary" role="alert">
        Preencha os campos abaixo e clique no botão <b>Enviar</b>
    </div>

    <form method="POST" action="{{ route('checkout.send') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Produto</label>
            <input type="text" class="form-control" name="productDescription" id="productDescription" required>
            <div class="form-text">Digite a descrição do produto que você está comprando.</div>
        </div>
        <div class="mb-3">
            <label for="productValue" class="form-label">Valor</label>
            <input type="number" class="form-control" name="productValue" id="productValue" min="0" step="0.01" required>
            <div class="form-text">Digite o valor do produto que você está comprando.</div>
        </div>

        <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
    </form>

    <a href="{{ route('checkout.thanks') }}">Thank You</a>
</x-layout.main>
