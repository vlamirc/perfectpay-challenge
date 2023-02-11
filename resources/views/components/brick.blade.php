@push('javascript')
    <script type="text/javascript">
        const mp = new MercadoPago('{{ config('app.mp_public_key') }}', {locale: '{{ config('app.locale') }}'});
        const bricksBuilder = mp.bricks();

        const renderPaymentBrick = async (bricksBuilder) => {
            const settings = {
                initialization: {
                    payer: {
                        email: '{{ $email }}',
                    },
                    amount: {{ $amount }},
                },
                customization: {
                    paymentMethods: {
                        creditCard: 'all',
                        ticket: [ 'bolbradesco' ],
                    },
                },
                callbacks: {
                    onReady: () => {
                        document.getElementById('spinner').style.display = 'none';
                    },
                    onSubmit: ({ selectedPaymentMethod, formData }) => {
                        console.log(formData);
                        return new Promise((resolve, reject) => {
                            fetch("{{ route('checkout.proccess') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify(formData)
                            })
                            .then((response) => {
                                resolve();
                                return response.json();
                            })
                            .then((data) => {
                                window.location.replace('{{ route('checkout.status') }}?id='+data.id);
                            })
                            .catch((error) => {
                                reject();
                                console.log(error);
                            })
                        });
                    },
                    onError: (error) => { // callback chamado para todos os casos de erro do Brick
                        console.error(error);
                    },
                },
            };

            window.paymentBrickController = await bricksBuilder.create(
                'payment',
                'paymentBrick_container',
                settings
            );
        };

        renderPaymentBrick(bricksBuilder);
    </script>
@endpush
