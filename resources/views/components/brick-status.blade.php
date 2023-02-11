@push('javascript')
    <script type="text/javascript">
        const mp = new MercadoPago('{{ config('app.mp_public_key') }}', {locale: '{{ config('app.locale') }}'});
        const bricksBuilder = mp.bricks();

        const renderStatusScreenBrick = async (bricksBuilder) => {
            const settings = {
                initialization: {
                    paymentId: '{{ $id }}', // id de pagamento gerado pelo Mercado Pago
                },
                callbacks: {
                    onReady: () => {
                        document.getElementById('spinner').style.display = 'none';
                    },
                    onError: (error) => {
                        // TODO
                    },
                },
                customization: {
                    visual: {
                        showExternalReference: true
                    },
                    backUrls: {
                       return: "{{ route('checkout.cart') }}"
                    },
                },
            };

            window.statusBrickController = await bricksBuilder.create(
                'statusScreen',
                'statusScreenBrick_container',
                settings
            );
        };

        renderStatusScreenBrick(bricksBuilder);

    </script>
@endpush
